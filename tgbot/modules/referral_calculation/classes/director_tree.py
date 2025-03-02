from .ref_tree import RefTree
from .ref_node import RefNode
class DirectorTree:
    def __init__(self) -> None:
        self.root = None
        self.ref_tree = None
        self.ar_director = None
    
    async def construct_tree(self, ref_tree: RefTree):
        self.ref_tree = ref_tree
        await self._prmotion_of_director()
        await self._construct_ar_directors()
        await self._construct_tree_director()
        await self._count_director_level()
        await self._designation_of_director()
        await self._add_potential_director_branches_to_users()
        await self._potential_designation_of_director()

        await self._construct_tree_master()
        return self

    async def _prmotion_of_director(self):
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

    async def _construct_tree_director(self):
        for node in self.ref_tree.user_dont_refferal:
            director_node = await self._get_first_director(node)
            if (director_node != self.ref_tree.root):          
                await self._construct_parentis_directors_recursive(director_node)

    async def _construct_ar_directors(self):
       ar_directors = [node for node in self.ref_tree.ar_ref_by_node if node.is_director]
       self.ar_director = ar_directors

    async def _count_director_level(self):
        for y in range(len(self.ar_director)):
            node = self.ar_director[y]
            append_node = node
            i = 1
            while i <= 6 and node.parent_director != None:
                node = node.parent_director
                node.children_director_by_level[i].append(append_node)
                i += 1 
    async def _designation_of_director(self):
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
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500
               and user.points >= 100):
                user.is_master = True
                user.status = 'gold_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 2
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500
               and user.points >= 100):
                user.tatus = 'dable_silver_master'
                user.is_master = True

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 1
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500 
               and user.sop >= 18500
               and user.points >= 100):
                user.status = 'silver_master'
                user.is_master = True

        
            elif (len(user.children_director_by_level[1]) >= 4 
                and await self._count_directors_in_attainable_generations(user, 5) >= 16
                and user.group_points >= 500 
                and user.points >= 100
                and user.sop >= 12500):
                user.status = 'master'
                user.is_master = True

            elif (len(user.children_director_by_level[1]) >= 3
                and await self._count_directors_in_attainable_generations(user, 5) >= 8
                and user.group_points >= 500 
                and user.points >= 70
                and user.sop >= 6500):
                user.status = 'diamond_director'

            elif (len(user.children_director_by_level[1]) >= 3 
                and await self._count_directors_in_attainable_generations(user, 4) >= 4
                and user.group_points >= 500 
                and user.points >= 70
                and user.sop >= 3500):
                user.status = 'emerald_director'

            elif (len(user.children_director_by_level[1]) >= 2 
                and await self._count_directors_in_attainable_generations(user, 3) >= 2
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
    
    async def _add_potential_director_branches_to_users(self):
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

    async def _potential_designation_of_director(self):
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
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500):
                user.potential_status = 'gold_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 2
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500):
                user.potential_status = 'dable_silver_master'

            elif(len(user.children_director_by_level[1]) >= 4
               and len(user.children_master) >= 1
               and await self._count_directors_in_attainable_generations(user, 6) >= 24
               and user.group_points >= 500 
               and user.sop >= 18500):
                user.potential_status = 'silver_master'

            elif (len(user.children_director_by_level[1]) >= 4 
                and await self._count_directors_in_attainable_generations(user, 6) >= 16
                and user.group_points >= 500 
                and user.sop >= 12500):
                user.potential_status = 'master'

            elif (len(user.children_director_by_level[1]) >= 3
                and await self._count_directors_in_attainable_generations(user, 5) >= 8
                and user.group_points >= 500 
                and user.sop >= 6500):
                user.potential_status = 'diamond_director'
                
            elif (len(user.children_director_by_level[1]) >= 3 
                and await self._count_directors_in_attainable_generations(user, 4) >= 4
                and user.group_points >= 500 
                and user.sop >= 3500):
                user.potential_status = 'emerald_director'

            elif (len(user.children_director_by_level[1]) >= 2 
                and await self._count_directors_in_attainable_generations(user, 3) >= 2
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

    async def _construct_tree_master(self):
        for node in self.ref_tree.user_dont_refferal:
            master_node = await self._get_first_master(node)
            if (master_node != self.ref_tree.root):          
                await self._construct_parentis_master_recursive(master_node)

    async def _construct_parentis_directors_recursive(self, node: RefNode):
        if node.parent_director == None:
            node.parent_director = await self._get_parent_director(node)
            node.parent_director.children_director.append(node)
        if node.parent_director != self.ref_tree.root:
            await self._construct_parentis_directors_recursive(node.parent_director)
        else:
            return
        
    async def _construct_parentis_master_recursive(self, node: RefNode):
        if node.parent_master == None:
            node.parent_master = await self._get_parent_master(node)
            node.parent_master.children_master.append(node)
        if node.parent_master != self.ref_tree.root:
            await self._construct_parentis_master_recursive(node.parent_master)
        else:
            return
 
    async def _get_parent_director(self, node: RefNode):
        if node.parent_director == None:
            if node.parent:
                if node.parent.is_director:
                    return node.parent
                elif node.parent == self.ref_tree.root:
                    return self.ref_tree.root
                else:
                    return await self._get_parent_director(node.parent)
        return node.parent_director

    async def _get_parent_master(self, node: RefNode):
        if node.parent_master == None:
            if node.parent:
                if node.parent.is_master:
                    return node.parent
                elif node.parent == self.ref_tree.root:
                    return self.ref_tree.root
                else:
                    return await self._get_parent_master(node.parent)
        return node.parent_master
                    
    async def _get_first_director(self, node: RefNode):
        if node.is_director:
            return node
        elif node == self.ref_tree.root:
            return self.ref_tree.root
        else:
            return await self._get_first_director(node.parent)
        
    async def _get_first_master(self, node: RefNode):
        if node.is_master:
            return node
        elif node == self.ref_tree.root:
            return self.ref_tree.root
        else:
            return await self._get_first_master(node.parent)

    async def _count_directors_in_attainable_generations(self, director, level = 1):
        counter_directors = 0
        for i in range(1,level):
            if director.children_director_by_level[i] != []:
                counter_directors += len(director.children_director_by_level[i])
        return counter_directors
