
from aiogram import *
from database.request_response_seller.request_response_seller import RequestResponseSellerDatabase as DB
from handlers.request_response_seller.response_seller import ResponseSeller
import asyncio
import hashlib

class RequestSeller:

    async def set_request_seller(self, id_buyer: int, id_seller: list, name_product: str, date_request: str, category: str, photo: str)->None:
        """
        Функция добавляет новый запрос продавцу в базу данных.
        'id_buyer': int,
        'id_seller': list[int],
        'name_product': str,
        'date_request': format_date 'YYYY-MM-DD'
        """
        hash_request = hashlib.md5(f"{id_buyer}{name_product}{date_request}".encode()).hexdigest()
        list_querys = await self.__consctrut_dict_query(id_buyer, id_seller, name_product, date_request, hash_request, category, photo)
        for query_seller in list_querys:
            await self.__set_query(query_seller)

        return hash_request

                              
    async def __consctrut_dict_query(self, id_buyer: int, id_seller: list, name_product: int, date_request: str, hash_request, category: str, photo: str) ->list:
        result = []
        for id in id_seller:
            result.append({
                'id_buyer': id_buyer,
                'id_seller': id,
                'name_product': name_product,
                'date_request': date_request,
                'hash_request': hash_request,
                'category': category,
                'photo': photo       
            })
        return result

    async def __set_query(self, query_seller:dict)->None:
        response_db = await self.__ready_response(query_seller)
        if (response_db):
            await DB().set_auto_request(response_db, query_seller)
        else:
            await DB().set_request_seller(query_seller)
            await ResponseSeller().send_message_seller(query_seller['id_seller'])
            

    async def __ready_response(self, query_seller:dict)->dict:

        result = await DB().get_ready_response(query_seller['id_seller'],
                                        query_seller['name_product'], 
                                        query_seller['date_request'])
        return result
        