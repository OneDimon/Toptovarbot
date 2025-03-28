from database.general.referral_program import ReferralDatabase as DB_referral
from .ref_node import RefNode
class RefTree:

    def __init__(self) -> None:
        self.dict_users_by_level = {}
        self.user_dont_refferal = []
        self.root = None
        self.ar_ref = None
        self.ar_ref_by_node = None

    async def construct_tree(self):
        self.ar_ref = await DB_referral.get_tree_referral(1, 100000)
        await self._construct_dict_nodes_by_level(self.ar_ref)
        await self._construct_tree_from_nodes_dict(self.dict_users_by_level)
        await self._construct_array_dont_refferal()
        await self._construct_ar_ref_by_node()
        return self
    
    async def _construct_dict_nodes_by_level(self, ar_ref_for_db: list):
        for referral in ar_ref_for_db:
            if referral[10] not in self.dict_users_by_level:
                self.dict_users_by_level[referral[10]] = []
            node = await self._construct_node(referral)
            self.dict_users_by_level[referral[10]].append(node)

    async def _construct_tree_from_nodes_dict(self, dict_nodes_by_level):
        for level in dict_nodes_by_level:
            if level == 1:
                self.root = dict_nodes_by_level[level][0]
                continue
            for node in dict_nodes_by_level[level]:
                for parent_node in dict_nodes_by_level[level - 1]:
                    if node.referrer_id == parent_node.user_id:
                        await self._add_node(node, parent_node)

    async def _construct_array_dont_refferal(self):
        for level in self.dict_users_by_level:
            for node in self.dict_users_by_level[level]:
                if node.children == []:
                    self.user_dont_refferal.append(node)

    
    async def _construct_node(self, ar_ref_for_db: list):
        node = RefNode(ar_ref_for_db[1], ar_ref_for_db[2], 
                            ar_ref_for_db[3], ar_ref_for_db[4], 
                            ar_ref_for_db[5], ar_ref_for_db[6], 
                            ar_ref_for_db[7], ar_ref_for_db[8], 
                            ar_ref_for_db[10], ar_ref_for_db[9])
        return node

    async def _add_node(self, node: RefNode, parent_node: RefNode):
        if (node.referrer_id == parent_node.user_id):
            parent_node.add_child(node)
            node.parent = parent_node

    async def _construct_ar_ref_by_node(self):
        self.ar_ref_by_node = []
        for level in self.dict_users_by_level:
            for node in self.dict_users_by_level[level]:
                self.ar_ref_by_node.append(node)


