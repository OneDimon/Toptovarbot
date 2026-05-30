from aiogram import Router, F, types, Bot
from aiogram.fsm.context import FSMContext
from states.states import DeliveryOrderCreate
from database.loader.delivery_order import DeliveryOrderDatabase

router = Router()


# ── Кнопка "Заказать отгрузку" из меню покупателя ───────────────────────────

@router.callback_query(F.data == "buyer_create_delivery")
async def create_delivery_start(call: types.CallbackQuery, state: FSMContext):
    await state.set_state(DeliveryOrderCreate.description)
    await call.message.answer(
        "📦 <b>Новая заявка на отгрузку</b>\n\n"
        "Опишите груз: что нужно перевезти, примерный вес и габариты."
    )
    await call.answer()


@router.message(DeliveryOrderCreate.description, F.text)
async def create_delivery_description(message: types.Message, state: FSMContext):
    await state.update_data(description=message.text)
    await state.set_state(DeliveryOrderCreate.address_from)
    await message.answer("📍 Укажите адрес <b>откуда</b> забрать груз:")


@router.message(DeliveryOrderCreate.address_from, F.text)
async def create_delivery_address_from(message: types.Message, state: FSMContext):
    await state.update_data(address_from=message.text)
    await state.set_state(DeliveryOrderCreate.address_to)
    await message.answer("🏁 Укажите адрес <b>куда</b> доставить груз:")


@router.message(DeliveryOrderCreate.address_to, F.text)
async def create_delivery_address_to(message: types.Message, state: FSMContext):
    await state.update_data(address_to=message.text)
    await state.set_state(DeliveryOrderCreate.confirm)

    data = await state.get_data()
    kb = types.InlineKeyboardMarkup(inline_keyboard=[
        [types.InlineKeyboardButton(text="✅ Подтвердить", callback_data="delivery_confirm_create")],
        [types.InlineKeyboardButton(text="❌ Отменить",    callback_data="delivery_cancel_create")],
    ])
    await message.answer(
        f"📋 <b>Проверьте заявку:</b>\n\n"
        f"📝 Груз: {data['description']}\n"
        f"📍 Откуда: {data['address_from']}\n"
        f"🏁 Куда: {message.text}",
        reply_markup=kb
    )


@router.callback_query(DeliveryOrderCreate.confirm, F.data == "delivery_confirm_create")
async def create_delivery_confirm(call: types.CallbackQuery, state: FSMContext, bot: Bot):
    data = await state.get_data()
    order_id = await DeliveryOrderDatabase.create_order(
        buyer_id=call.from_user.id,
        description=data["description"],
        address_from=data["address_from"],
        address_to=data["address_to"]
    )
    await state.clear()

    if order_id:
        await call.message.edit_text(
            f"✅ <b>Заявка #{order_id} создана!</b>\n\n"
            f"Грузчики получат уведомление и смогут взять ваш заказ.\n"
            f"Вы получите уведомление когда кто-то возьмётся за доставку."
        )
    else:
        await call.message.edit_text("⚠️ Ошибка при создании заявки. Попробуйте позже.")

    await call.answer()


@router.callback_query(F.data == "delivery_cancel_create")
async def create_delivery_cancel(call: types.CallbackQuery, state: FSMContext):
    await state.clear()
    await call.message.edit_text("❌ Заявка отменена.")
    await call.answer()


# ── История заявок покупателя ────────────────────────────────────────────────

@router.callback_query(F.data == "buyer_my_deliveries")
async def buyer_my_deliveries(call: types.CallbackQuery):
    orders = await DeliveryOrderDatabase.get_orders_for_buyer(call.from_user.id)
    if not orders:
        await call.message.answer("📭 Вы ещё не создавали заявок на отгрузку.")
        await call.answer()
        return

    STATUS_LABEL = {
        "new":         "🆕 Ожидает грузчика",
        "taken":       "🟡 Взят грузчиком",
        "in_progress": "🚚 В пути",
        "done":        "✅ Выполнен",
        "cancelled":   "❌ Отменён",
    }
    text = "📋 <b>Ваши заявки на отгрузку:</b>\n\n"
    for order in orders[:10]:
        status = STATUS_LABEL.get(order[7], order[7])
        text += f"• <b>#{order[0]}</b> — {order[4][:35]}...\n  {status}\n\n"

    await call.message.answer(text)
    await call.answer()
