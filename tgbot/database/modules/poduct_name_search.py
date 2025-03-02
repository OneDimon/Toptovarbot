import database.base as base

class ProductNameSearchDatabase(base.BaseDatabase):

    async def get_product_name_search(self, product_name):
        query = f""" SELECT DISTINCT product_name 
            FROM goods 
            WHERE product_name LIKE '%{product_name}%'"""
        
        result = await self.query_database(query)
        if (len(result) > 0):
            return result
        else:
            return None
