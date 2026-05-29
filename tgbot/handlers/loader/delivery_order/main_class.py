from aiogram import Router, F, types, Bot
from aiogram.fsm.context import FSMContext
from states.states import DeliveryOrderComplete
from database.loader.delivery_order import DeliveryOrderDatabase
from database.general.users import UsersDatabase
import os

router = Router()


def _check_subscription(user: dict) -> bool:
    """Проверяет активную подписку грузчика."""
    import datetime
    if not user.get("SUBSCRIPTION"):
        return False
    end = user.get("DATE_END_SUBSCRIPTION")
    if end and end < datetime.datetime.now():
        return False
    return True


def _order_text(order: dict | tuple) -> str:
    """Форматирует заявку для отображения."""
    if isinstance(order, tuple):
        # (ID, BUYER_ID, LOADER_ID, SELLER_ID, DESCRIPTION, ADDRESS_FROM, ADDRESS_TO, STATUS, ...)
        return (
            f"📦 <b>Заявка #{order[0]}</b>\n"
            f"👤 Покупатель ID: <code>{order[1]}</code>\n"
            f"📝 Описание: {order[4]}\n"
            f"📍 Откуда: {order[5]}\n"
            f"🏁 Куда: {order[6]}\n"
            f"🕐 Создана: {order[10]}"
        )
    return str(order)


# ── Список открытых заявок ──────────────────────────────────────────────────

@router.callback_query(F.data == "delivery_open_orders")
async def show_open_orders(call: types.CallbackQuery):
    user_data = await UsersDatabase.get_user(call.from_user.id)
    if not user_data or not _check_subscription(user_data[0]._asdict() if hasattr(user_data[0], "_asdict") else dict(zip(
        ["USER_ID","NAME","CITY","SUBSCRIPTION","DATE_END_SUBSCRIPTION","ORGANIZATION","OFFERTA","TFONE","rights"], user_data[0]
    ))):
        await call.message.answer(
            "❌ <b>Доступ закрыт</b>\n\n"
            "Для просмотра заявок необходима активная подписка.\n"
            "Оформить подписку: /start → Грузчик → Оформить подписку"
        )
        await call.answer()
        return

    orders = await DeliveryOrderDatabase.get_open_orders()
    if not orders:
        await call.message.answer("📭 Открытых заявок пока нет. Попробуйте позже.")
        await call.answer()
        return

    for order in orders[:10]:  # показываем максимум 10
        kb = types.InlineKeyboardMarkup(inline_keyboard=[[
            types.InlineKeyboardButton(text="✅ Взять заказ", callback_data=f"delivery_take_{order[0]}")
        ]])
        await call.message.answer(_order_text(order), reply_markup=kb)

    await call.answer()


# ── Взять заказ ─────────────────────────────────────────────────────────────

@router.callback_query(F.data.startswith("delivery_take_"))
async def take_order(call: types.CallbackQuery, bot: Bot):
    order_id = int(call.data.split("_")[-1])
    success = await DeliveryOrderDatabase.take_order(order_id, call.from_user.id)

    if not success:
        await call.answer("⚠️ Заявка уже взята другим грузчиком.", show_alert=True)
        return

    order = await DeliveryOrderDatabase.get_order_by_id(order_id)
    await call.message.edit_text(
        _order_text(order) + "\n\n✅ <b>Вы взяли этот заказ</b>",
        reply_markup=types.InlineKeyboardMarkup(inline_keyboard=[[
            types.InlineKeyboardButton(text="🚚 Начать отгрузку", callback_data=f"delivery_start_{order_id}")
        ]])
    )

    # Уведомить покупателя
    try:
        await bot.send_message(
            order[1],
            f"✅ Ваша заявка <b>#{order_id}</b> взята грузчиком!\n"
            f"Он свяжется с вами в ближайшее время."
        )
    except Exception:
        pass

    await call.answer()


# ── Начать отгрузку ──────────────────────────────────────────────────────────

@router.callback_query(F.data.startswith("delivery_start_"))
async def start_order(call: types.CallbackQuery, bot: Bot):
    order_id = int(call.data.split("_")[-1])
    success = await DeliveryOrderDatabase.start_order(order_id, call.from_user.id)

    if not success:
        await call.answer("⚠️ Невозможно начать: заявка не найдена или уже выполняется.", show_alert=True)
        return

    order = await DeliveryOrderDatabase.get_order_by_id(order_id)
    await call.message.edit_text(
        _order_text(order) + "\n\n🚚 <b>Отгрузка началась</b>",
        reply_markup=types.InlineKeyboardMarkup(inline_keyboard=[[
            types.InlineKeyboardButton(text="✔️ Завершить заказ", callback_data=f"delivery_done_{order_id}")
        ]])
    )

    # Уведомить покупателя
    try:
        await bot.send_message(order[1], f"🚚 Грузчик начал отгрузку по вашей заявке <b>#{order_id}</b>!")
    except Exception:
        pass

    await call.answer()


# ── Завершить заказ (FSM: фото → комментарий) ───────────────────────────────

@router.callback_query(F.data.startswith("delivery_done_"))
async def done_order_start(call: types.CallbackQuery, state: FSMContext):
    order_id = int(call.data.split("_")[-1])
    await state.update_data(order_id=order_id)
    await state.set_state(DeliveryOrderComplete.photo)
    await call.message.answer(
        "📸 Сделайте фото подтверждения доставки и отправьте его:"
    )
    await call.answer()


@router.message(DeliveryOrderComplete.photo, F.photo)
async def done_order_photo(message: types.Message, state: FSMContext):
    photo_id = message.photo[-1].file_id
    await state.update_data(photo_id=photo_id)
    await state.set_state(DeliveryOrderComplete.comment)
    await message.answer("💬 Добавьте комментарий к заказу (или напишите «-» если не нужен):")


@router.message(DeliveryOrderComplete.comment, F.text)
async def done_order_comment(message: types.Message, state: FSMContext, bot: Bot):
    data = await state.get_data()
    order_id = data["order_id"]
    photo_id = data["photo_id"]
    comment = message.text if message.text != "-" else ""

    result = await DeliveryOrderDatabase.complete_order(
        order_id, message.from_user.id, photo_id, comment
    )

    if not result:
        await message.answer("⚠️ Не удалось завершить заказ. Попробуйте ещё раз.")
        await state.clear()
        return

    buyer_id = result[1]
    await message.answer(f"✅ <b>Заказ #{order_id} успешно завершён!</b>\nСпасибо за работу.")
    await state.clear()

    # Уведомить покупателя с фото
    try:
        caption = (
            f"🎉 Ваша заявка <b>#{order_id}</b> выполнена!\n"
            + (f"Комментарий грузчика: {comment}" if comment else "")
        )
        await bot.send_photo(buyer_id, photo=photo_id, caption=caption)
    except Exception:
        pass


# ── Мои заказы (история грузчика) ────────────────────────────────────────────

@router.callback_query(F.data == "delivery_my_orders")
async def my_orders(call: types.CallbackQuery):
    orders = await DeliveryOrderDatabase.get_orders_for_loader(call.from_user.id)
    if not orders:
        await call.message.answer("📭 У вас пока нет заказов.")
        await call.answer()
        return

    STATUS_EMOJI = {"new": "🆕", "taken": "🟡", "in_progress": "🚚", "done": "✅", "cancelled": "❌"}
    text = "📋 <b>Ваши заказы:</b>\n\n"
    for order in orders[:15]:
        emoji = STATUS_EMOJI.get(order[7], "•")
        text += f"{emoji} #{order[0]} — {order[4][:40]}...\n"

    await call.message.answer(text)
    await call.answer()
