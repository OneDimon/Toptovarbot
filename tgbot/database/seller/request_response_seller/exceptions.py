class ExcetionIdSellerNotFound(Exception):
    def __init__(self, message = ''):
        self.message = f'не задан id продавца или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class ExcetionIdBuyerNotFound(Exception):
    def __init__(self, message = ''):
        self.message = f'не задан id покупателя или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class ExcetionNameProductNotFound(Exception):
    def __init__(self, message: str = ''):
        self.message = f'не задано название продукта или формат id некоррект: {message}'
    
    def __str__(self):
        return self.message

class ExceptionDateRequestNotFound(Exception):
    def __init__(self, message: str = ''):
        self.message = f'не задана дата запроса или формат даты некоррект: {message}'
    
    def __str__(self):
        return self.message
