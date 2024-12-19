from database.referral_program import Referral_database as DB_referral
class referal_node:
    def __init__(self, user_id, referrer_id, points, group_points, sop, status, last_status, balance, level, patential_status) -> None:
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


class referal_tree:

    def __init__(self) -> None:
        self.dict_users_by_level = {}
        self.user_dont_refferal = []
        self.root = None
        self.ar_ref = None
        self.ar_ref_by_node = None

    async def construct_node(self, ar_ref_for_db: list):
        node = referal_node(ar_ref_for_db[1], ar_ref_for_db[2], 
                            ar_ref_for_db[3], ar_ref_for_db[4], 
                            ar_ref_for_db[5], ar_ref_for_db[6], 
                            ar_ref_for_db[7], ar_ref_for_db[8], 
                            ar_ref_for_db[10], ar_ref_for_db[9])
        return node

    async def add_node(self, node: referal_node, parent_node: referal_node):
        if (node.referrer_id == parent_node.user_id):
            parent_node.add_child(node)
            node.parent = parent_node

    async def construct_tree(self):
        self.ar_ref = await DB_referral.get_tree_referral(1, 100000)
        await self.construct_dict_nodes_by_level(self.ar_ref)
        await self.construct_tree_from_nodes_dict(self.dict_users_by_level)
        await self.construct_array_dont_refferal()
        await self.construct_ar_ref_by_node()
        return self


    async def construct_dict_nodes_by_level(self, ar_ref_for_db: list):
        for referral in ar_ref_for_db:
            if referral[10] not in self.dict_users_by_level:
                self.dict_users_by_level[referral[10]] = []
            node = await self.construct_node(referral)
            self.dict_users_by_level[referral[10]].append(node)

    async def construct_array_dont_refferal(self):
        for level in self.dict_users_by_level:
            for node in self.dict_users_by_level[level]:
                if node.children == []:
                    self.user_dont_refferal.append(node)

    async def construct_tree_from_nodes_dict(self, dict_nodes_by_level):
        for level in dict_nodes_by_level:
            if level == 1:
                self.root = dict_nodes_by_level[level][0]
                continue
            for node in dict_nodes_by_level[level]:
                for parent_node in dict_nodes_by_level[level - 1]:
                    if node.referrer_id == parent_node.user_id:
                        await self.add_node(node, parent_node)

    async def construct_ar_ref_by_node(self):
        self.ar_ref_by_node = []
        for level in self.dict_users_by_level:
            for node in self.dict_users_by_level[level]:
                self.ar_ref_by_node.append(node)

class director_tree:
    def __init__(self) -> None:
        self.root = None
        self.ref_tree = None
        self.ar_director = None
    
    async def construct_tree(self, ref_tree: referal_tree):
        self.ref_tree = ref_tree
        await self.prmotion_of_director()
        await self.construct_ar_directors()
        await self.construct_tree_director()
        await self.count_director_level()
        await self.designation_of_director()
        await self.add_potential_director_branches_to_users()
        await self.potential_designation_of_director()

        await self.construct_tree_master()
        return self

    async def prmotion_of_director(self):
        for level in self.ref_tree.dict_users_by_level:
            for node in self.ref_tree.dict_users_by_level[level]:
                if node.points == None:
                    node.points = 0
                if node.group_points == None:
                    node.group_points = 0
                if node.sop == None:
                    node.sop = 0
                if(node.points >= 50 and node.group_points >= 500):
                    node.is_director = True

    async def construct_tree_director(self):
        for node in self.ref_tree.user_dont_refferal:
            director_node = await self.get_first_director(node)
            if (director_node != self.ref_tree.root):          
                await self.construct_parentis_directors_recursive(director_node)
    
    async def construct_tree_master(self):
        for node in self.ref_tree.user_dont_refferal:
            master_node = await self.get_first_master(node)
            if (master_node != self.ref_tree.root):          
                await self.construct_parentis_master_recursive(master_node)

    async def construct_parentis_directors_recursive(self, node: referal_node):
        if node.parent_director == None:
            node.parent_director = await self.get_parent_director(node)
            node.parent_director.children_director.append(node)
        if node.parent_director != self.ref_tree.root:
            await self.construct_parentis_directors_recursive(node.parent_director)
        else:
            return
        
    async def construct_parentis_master_recursive(self, node: referal_node):
        if node.parent_master == None:
            node.parent_master = await self.get_parent_master(node)
            node.parent_master.children_master.append(node)
        if node.parent_master != self.ref_tree.root:
            await self.construct_parentis_master_recursive(node.parent_master)
        else:
            return
 
    async def get_parent_director(self, node: referal_node):
        if node.parent_director == None:
            if node.parent:
                if node.parent.is_director:
                    return node.parent
                elif node.parent == self.ref_tree.root:
                    return self.ref_tree.root
                else:
                    return await self.get_parent_director(node.parent)
        return node.parent_director

    async def get_parent_master(self, node: referal_node):
        if node.parent_master == None:
            if node.parent:
                if node.parent.is_master:
                    return node.parent
                elif node.parent == self.ref_tree.root:
                    return self.ref_tree.root
                else:
                    return await self.get_parent_master(node.parent)
        return node.parent_master
                    
    async def get_first_director(self, node: referal_node):
        if node.is_director:
            return node
        elif node == self.ref_tree.root:
            return self.ref_tree.root
        else:
            return await self.get_first_director(node.parent)
        
    async def get_first_master(self, node: referal_node):
        if node.is_master:
            return node
        elif node == self.ref_tree.root:
            return self.ref_tree.root
        else:
            return await self.get_first_master(node.parent)

    async def construct_ar_directors(self):
       ar_directors = [node for node in self.ref_tree.ar_ref_by_node if node.is_director]
       self.ar_director = ar_directors
    
    async def count_director_level(self):
        for y in range(len(self.ar_director)):
            node = self.ar_director[y]
            append_node = node
            i = 1
            while i <= 6 and node.parent_director != None:
                node = node.parent_director
                node.children_director_by_level[i].append(append_node)
                i += 1 

    async def designation_of_director(self):
        for user in self.ref_tree.ar_ref_by_node:
            
            director_branch = len(user.children_director_by_level[1])
            user.last_status = user.status

            if(director_branch >= 10
               and len(user.children_master)>= 10
               and user.points >= 100):
                user.status = 'star_master'
                user.is_master = True
                
            elif(director_branch >= 6
               and len(user.children_master)>= 6
               and user.group_points >= 500
               and user.points >= 100):
                user.status = 'platinum_master'
                user.is_master = True

            elif(director_branch >= 4
               and len(user.children_master)>= 3
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500
               and user.points >= 100):
                user.is_master = True
                user.status = 'gold_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 2
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500
               and user.points >= 100):
                user.tatus = 'dable_silver_master'
                user.is_master = True

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 1
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500 
               and user.sop >= 18500
               and user.points >= 100):
                user.status = 'silver_master'
                user.is_master = True

        
            elif (len(user.children_director_by_level[1]) >= 4 
                and await self.count_directors_in_attainable_generations(user, 5) >= 16
                and user.group_points >= 500 
                and user.points >= 100
                and user.sop >= 12500):
                user.status = 'master'
                user.is_master = True

            elif (len(user.children_director_by_level[1]) >= 3
                and await self.count_directors_in_attainable_generations(user, 5) >= 8
                and user.group_points >= 500 
                and user.points >= 70
                and user.sop >= 6500):
                user.status = 'diamond_director'

            elif (len(user.children_director_by_level[1]) >= 3 
                and await self.count_directors_in_attainable_generations(user, 4) >= 4
                and user.group_points >= 500 
                and user.points >= 70
                and user.sop >= 3500):
                user.status = 'emerald_director'

            elif (len(user.children_director_by_level[1]) >= 2 
                and await self.count_directors_in_attainable_generations(user, 3) >= 2
                and user.group_points >= 500 
                and user.points >= 70
                and user.sop >= 2000):
                user.status = 'gold_director'

            elif (len(user.children_director_by_level[1]) >= 1 
                and user.group_points >= 500 
                and user.points >= 50):
                user.status = 'silver_director'

            elif (user.is_director):
                user.status = 'director'

            else:
                user.status = 'ASSISTANT'

    async def add_potential_director_branches_to_users(self):
        for director in self.ar_director:
            node = director
            while node.parent != None and  node.parent.is_director == False:
                node.parent.children_director.append(director)
                if director.is_master:
                    node.parent.children_master.append(director)
                for i in range(1,6):
                    if i == 1:
                        node.parent.children_director_by_level[i].append(director)
                    else:
                        node.parent.children_director_by_level[i-1].extend(director.children_director_by_level[i])
                node = node.parent

    async def potential_designation_of_director(self):
        for user in self.ref_tree.ar_ref_by_node:
            director_branch = len(user.children_director_by_level[1])
            if(director_branch >= 10
               and len(user.children_master)>= 10):
                user.potential_status = 'star_master'

            elif(director_branch >= 6
               and len(user.children_master)>= 6
               and user.group_points >= 500):
                user.potential_status = 'platinum_master'

            elif(director_branch >= 4
               and len(user.children_master)>= 3
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500):
                user.potential_status = 'gold_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 2
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500):
                user.potential_status = 'dable_silver_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 1
               and await self.count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500 
               and user.sop >= 18500):
                user.potential_status = 'silver_master'

            elif (len(user.children_director_by_level[1]) >= 4 
                and await self.count_directors_in_attainable_generations(user, 6) >= 16
                and user.group_points >= 500 
                and user.sop >= 12500):
                user.potential_status = 'master'

            elif (len(user.children_director_by_level[1]) >= 3
                and await self.count_directors_in_attainable_generations(user, 5) >= 8
                and user.group_points >= 500 
                and user.sop >= 6500):
                user.potential_status = 'diamond_director'
                
            elif (len(user.children_director_by_level[1]) >= 3 
                and await self.count_directors_in_attainable_generations(user, 4) >= 4
                and user.group_points >= 500 
                and user.sop >= 3500):
                user.potential_status = 'emerald_director'

            elif (len(user.children_director_by_level[1]) >= 2 
                and await self.count_directors_in_attainable_generations(user, 3) >= 2
                and user.group_points >= 500 
                and user.sop >= 2000):
                user.potential_status = 'gold_director'

            elif (len(user.children_director_by_level[1]) >= 1 
                and user.group_points >= 500):
                user.potential_status = 'silver_director'

            elif (user.group_points >= 500):
                user.status = 'director'

            else:
                user.status = 'ASSISTANT'

    async def count_directors_in_attainable_generations(self, director, level = 1):
        counter_directors = 0
        for i in range(1,level):
            if director.children_director_by_level[i] != []:
                counter_directors += len(director.children_director_by_level[i])
        return counter_directors

class bomus_system:
    def __init__(self, director_tree: director_tree) -> None:
        self.ar_ref = director_tree.ref_tree.ar_ref_by_node
        self.ar_director = [node for node in director_tree.ref_tree.ar_ref_by_node if node.status != 'ASSISTANT']
        self.sum_bonus = 0

    async def bonus_calculation(self):
        await self.calculation_bonuc_bY_points()
        await self.calculation_bonus_by_group_points()
        await self.calculation_bonus_by_generations()
        await self.calculation_bonus_by_infinity()
        await self.update_balance()
        await self.update_table()

    async def calculation_bonuc_bY_points(self):
        for user in self.ar_ref:
            if user.status == 'ASSISTANT':
                user.bonus += 0.1 * user.points
            else:
                user.bonus += 0.25 * user.points
    
    async def calculation_bonus_by_group_points(self):
        for director in self.ar_director:
           bonus, real_group_points = await self.get_group_points_sum(director)
           director.bonus += bonus
           director.real_group_points += real_group_points

    async def calculation_bonus_by_generations(self):
        ar_bonus_by_generations = {1:0.1, 2:0.08, 3:0.05, 4:0.05, 5:0.05, 6:0.05}
        for director in self.ar_director:
            master_bonus = await self.get_master_bonus(director.status)
            for i in range(1,6):
                for user in director.children_director_by_level[i]:
                    director.bonus += (ar_bonus_by_generations[i]+master_bonus) * user.real_group_points

    async def get_group_points_sum(self, node: referal_node, level=0): 
        points_sum = node.points
        real_group_points_sum = node.points
        if level == 1:
            points_sum = 0.25 * node.points
        elif level == 0:
            points_sum = node.points*0
        else:
            points_sum = 0.10 * node.points
            
        for child in node.children:
            if child.is_director:
                continue
            points, real_group_points = await self.get_group_points_sum(child, level + 1)
            points_sum += points
            real_group_points_sum += real_group_points

        return points_sum, real_group_points_sum
    
    async def calculation_bonus_by_infinity(self):
        for director in self.ar_director:
            master_bonus = await self.get_master_bonus(director.status)
            bonus = await self.get_infinity_points_sum(director)
            director.bonus += bonus * master_bonus

    async def update_balance(self):
        for user in self.ar_ref:
            if(user.balance == None):
                user.balance = 0
            user.balance += user.bonus
            self.sum_bonus += user.bonus

    async def update_table(self):
        await DB_referral.update_data_ref_program_after_bonus_calculate(self.ar_ref)
    async def get_master_bonus(self, status):
        if status == 'master':
            master_bonus = 0.01
        elif status == 'silver_master':
            master_bonus = 0.02
        elif status == 'duble_silver_master':
            master_bonus = 0.03
        elif status == 'gold_master':
            master_bonus = 0.04
        elif status == 'platinum_master':
            master_bonus = 0.045
        elif status == 'star_master':
            master_bonus = 0.05
        else:
            master_bonus = 0
        return master_bonus

    async def get_infinity_points_sum(self, node: referal_node, level=0): 
        points_sum = node.points

        if level > 6:
            points_sum = node.points
        elif level == 0:
            points_sum = node.points*0
        else:
            points_sum = 0 * node.points
            
        for child in node.children_director:
            points_sum += await self.get_infinity_points_sum(child, level + 1)

        return points_sum
                
