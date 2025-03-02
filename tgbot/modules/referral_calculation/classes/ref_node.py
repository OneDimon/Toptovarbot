class RefNode:
    def __init__(self, user_id, referrer_id, points = 0, group_points = 0, sop = 0, status = None, last_status = None, balance = 0, level = 1, patential_status = None) -> None:
        self.user_id = user_id
        self.referrer_id = referrer_id
        self.points = points
        self.group_points = group_points
        self.real_group_points = 0
        self.sop = sop
        self.status = status
        self.last_status = last_status
        self.balance = balance
        self.bonus = 0
        self.potential_status = patential_status

        self.level = level
        self.parent = None
        self.children = []

        self.children_director = []       
        self.is_director = False
        self.parent_director = None
        self.children_director_by_level = {1: [], 2: [], 3: [], 4: [], 5: [], 6: []}

        self.children_master = []
        self.is_master = False
        self.parent_master = None

    def add_child(self, child):
        self.children.append(child)
    
    def get_children(self):
        return self.children
    
    def remove_child(self, child):
        if child in self.children:
            self.children.remove(child)