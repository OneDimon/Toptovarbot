class Excetion_id_seller_not_found(Exception):
    def __init__(self, message = ''):
        self.message = f'не задан id продавца или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class Excetion_id_buyer_not_found(Exception):
    def __init__(self, message = ''):
        self.message = f'не задан id покупателя или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class Excetion_name_product_not_found(Exception):
    def __init__(self, message: str = ''):
        self.message = f'не задано название продукта или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class Exception_date_request_not_found(Exception):
    def __init__(self, message: str = ''):
        self.message = f'не задана дата запроса или формат даты некоррект: {message}'
    
    def __str__(self):
        return self.message
