from .director_tree import DirectorTree
from .ref_node import RefNode
from database.referral_program import ReferralDatabase as DB_referral
from database.system_info import SystemInfoDatabase as DB_system

class BonusSystem:
    def __init__(self, director_tree: DirectorTree) -> None:
        self.ar_ref = director_tree.ref_tree.ar_ref_by_node
        self.ar_director = [node for node in director_tree.ref_tree.ar_ref_by_node if node.status != 'ASSISTANT']
        self.sum_bonus = 0
        self.system_free_sum = 0

    async def bonus_calculation(self):
        await self._calculation_bonuc_bY_points()
        await self._calculation_bonus_by_group_points()
        await self._calculation_bonus_by_generations()
        await self._calculation_bonus_by_infinity()
        await self._update_balance()
        await self._update_tables()

    async def _calculation_bonuc_bY_points(self):
        from globals import CustomLogger
        for user in self.ar_ref:
            self.system_free_sum += user.points
            if user.status == 'ASSISTANT':
                user.bonus += 0.1 * user.points
            else:
                user.bonus += 0.25 * user.points
        await CustomLogger('logs/acton_log/bonus_calculation.log').logging_system_info(f'Суммарное количество баллов в системе рассчета: {self.system_free_sum}')
    
    async def _calculation_bonus_by_group_points(self):
        for director in self.ar_director:
           bonus, real_group_points = await self._get_group_points_sum(director)
           director.bonus += bonus
           director.real_group_points += real_group_points

    async def _calculation_bonus_by_generations(self):
        ar_bonus_by_generations = {1:0.1, 2:0.08, 3:0.05, 4:0.05, 5:0.05, 6:0.05}
        for director in self.ar_director:
            master_bonus = await self._get_master_bonus(director.status)
            for i in range(1,6):
                for user in director.children_director_by_level[i]:
                    director.bonus += (ar_bonus_by_generations[i]+master_bonus) * user.real_group_points

    async def _get_group_points_sum(self, node: RefNode, level=0): 
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
            points, real_group_points = await self._get_group_points_sum(child, level + 1)
            points_sum += points
            real_group_points_sum += real_group_points

        return points_sum, real_group_points_sum
    
    async def _calculation_bonus_by_infinity(self):
        for director in self.ar_director:
            master_bonus = await self._get_master_bonus(director.status)
            bonus = await self._get_infinity_points_sum(director)
            director.bonus += bonus * master_bonus

    async def _update_balance(self):
        from globals import CustomLogger
        for user in self.ar_ref:
            if(user.balance == None):
                user.balance = 0
            user.balance += user.bonus
            self.sum_bonus += user.bonus
        self.system_free_sum -= self.sum_bonus
        await CustomLogger('logs/acton_log/bonus_calculation.log').logging_system_info(f'Суммарное количество баллов выплаченное пользователям: {self.sum_bonus}')
        await CustomLogger('logs/acton_log/bonus_calculation.log').logging_system_info(f'количество свободных баллов в системе: {self.system_free_sum}')

        

    async def _update_tables(self):
        await DB_referral.update_data_ref_program_after_bonus_calculate(self.ar_ref)
        system_free_sum = DB_system.get_system_info('free_system_system_free_sumsum')
        DB_system.set_system_info('system_free_sum', system_free_sum + self.system_free_sum)
        
    async def _get_master_bonus(self, status):
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

    async def _get_infinity_points_sum(self, node: RefNode, level=0): 
        points_sum = node.points

        if level > 6:
            points_sum = node.points
        elif level == 0:
            points_sum = node.points*0
        else:
            points_sum = 0 * node.points
            
        for child in node.children_director:
            points_sum += await self._get_infinity_points_sum(child, level + 1)

        return points_sum
                
