from database.categories_product import CategoriesProductDatabase as DB_categories

class SearchCategoriesModules:
    def __init__(self):
        self.search_query = None  
        self.ar_categories = []

    async def search_categories(self, search_query: str) -> list:
        self.ar_categories = await DB_categories.get_all_categories()
        filtered_categories = await self.filter_categories(search_query)
        return filtered_categories  
        
    
    async def filter_categories(self, search_query: str) -> list:
        filtered_categories = []
        for item in self.ar_categories:
            new_item = []
            for field in item:
                field = str(field).lower()
                if isinstance(field, str) and (search_query.lower() in field.lower() or search_query.lower() == field.lower()):
                    highlighted = field.replace(
                        search_query, search_query.upper()
                    )
                    new_item.append(highlighted)
                else:
                    new_item.append(field)
            # Проверяем, есть ли совпадение хотя бы в одном поле
            if any(search_query.lower() in str(field).lower() for field in item):
                filtered_categories.append(tuple(new_item))

        sorted_categories = sorted(filtered_categories, key=lambda x: self.sort_categories(x, search_query))
        sortet_categories_with_hash = await self.add_hash_to_categories(sorted_categories)
        return sortet_categories_with_hash[:50]
    
    def sort_categories(self, item: str, search_query: str) -> list:
        """
        Возвращает кортеж приоритетов для сортировки:
        1. Полное совпадение (0)
        2. Начало строки совпадает (1)
        3. Содержит подстроку (2)
        4. Порядок поля (чем дальше от конца, тем ниже приоритет)
        5. Если ничего не совпадает (3)
        """
        for priority, field in enumerate(reversed(item)):
            if isinstance(field, str):
                field_lower = field.lower()
                search_lower = search_query.lower()
                if field_lower == search_lower:  # Полное совпадение
                    return (0, priority)
                elif field_lower.startswith(search_lower):  # Начинается с
                    return (1, priority)
                elif search_lower in field_lower:  # Содержит подстроку
                    return (2, priority)
        return (3, len(item))  # Если нет совпадений

    async def add_hash_to_categories(self, categories: list) -> list:
        import hashlib
        category_with_hash = []
        for category in categories:
            category = list(category)
            category.append(hashlib.sha256(str(category).encode('utf-8')).hexdigest()[:64])
            category_with_hash.append(tuple(category))
        return category_with_hash