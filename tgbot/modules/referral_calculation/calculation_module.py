from .classes import RefTree, DirectorTree, BonusSystem, CreaterBackupReferral
import asyncio

async def main():
    ref_tree = RefTree()
    await ref_tree.construct_tree()
    director_tree = DirectorTree()
    await director_tree.construct_tree(ref_tree)
    bonus_system = BonusSystem(director_tree)
    await bonus_system.bonus_calculation()


CreaterBackupReferral().create_backup()
asyncio.run(main())