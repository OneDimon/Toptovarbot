from database import base

class ReferralDatabase (base.BaseDatabase):

    @staticmethod
    async def create_table():
        query = """CREATE TABLE IF NOT EXISTS referral 
            (
                ID BIGSERIAL PRIMARY KEY NOT NULL,
                USER_ID BIGINT NOT NULL,
                LINK VARCHAR(1000) NOT NULL,
                FOREIGN KEY (USER_ID) REFERENCES users (USER_ID),
                REFERRER_ID BIGINT NOT NULL,
                FOREIGN KEY (REFERRER_ID) REFERENCES users (USER_ID),
                POINTS BIGINT,
                GROUP_POINTS BIGINT,
                SOP BIGINT,
                STATUS VARCHAR(100),
                LAST_STATUS VARCHAR(100),
                BALANCE BIGINT,
                POTENtIAL_STATUS VARCHAR(100)
            )"""
        await ReferralDatabase.query_database(ReferralDatabase(), query)

    @staticmethod 
    async def add_referral(id_user, link, referrer_id):
        query = """INSERT INTO referral (USER_ID, LINK, REFERRER_ID, STATUS) VALUES (%s, %s, %s, 'ASSISTANT')"""
        await ReferralDatabase.query_database(ReferralDatabase(), query, (id_user, link, referrer_id))

    @staticmethod
    async def get_tree_referral(id_user, max_level=8):
        query = """WITH RECURSIVE ReferralTree AS (
                SELECT 
                    ID,
                    USER_ID,
                    REFERRER_ID,
                    POINTS,
                    GROUP_POINTS,
                    SOP,
                    STATUS,
                    LAST_STATUS,
                    BALANCE,
                    POTENtIAL_STATUS,
                    1 AS level
                FROM 
                    referral
                WHERE 
                    REFERRER_ID = %s

                UNION ALL

                SELECT 
                    r.ID,
                    r.USER_ID,
                    r.REFERRER_ID,
                    r.POINTS,
                    r.GROUP_POINTS,
                    r.SOP,
                    r.STATUS,
                    r.LAST_STATUS,
                    r.BALANCE,
                    r.POTENtIAL_STATUS,
                    rt.level + 1 
                FROM 
                    referral r
                INNER JOIN 
                    ReferralTree rt ON r.REFERRER_ID = rt.USER_ID 
                WHERE 
                    rt.level < %s
            )
            SELECT * FROM ReferralTree;"""
        return await ReferralDatabase.query_database(ReferralDatabase(), query, (id_user, max_level))
    

    @staticmethod
    async def get_data_user_ref_program(id_user):
        query = """SELECT * FROM referral WHERE USER_ID = %s"""
        all_data = await ReferralDatabase.query_database(ReferralDatabase(), query, (id_user,))
        return all_data[0]
    
    @staticmethod
    async def get_all_referrers(id_user):
        query = """WITH RECURSIVE referral_tree AS (
            SELECT 
                ID, 
                USER_ID, 
                LINK,
                REFERRER_ID, 
                POINTS, 
                GROUP_POINTS, 
                SOP, 
                STATUS, 
                LAST_STATUS, 
                BALANCE,
                POTENtIAL_STATUS
            FROM referral
            WHERE USER_ID = %s

            UNION ALL

            SELECT 
                r.ID, 
                r.USER_ID, 
                r.LINK,
                r.REFERRER_ID, 
                r.POINTS, 
                r.GROUP_POINTS, 
                r.SOP, 
                r.STATUS, 
                r.LAST_STATUS, 
                r.BALANCE,
                r.POTENtIAL_STATUS
            FROM referral r
            INNER JOIN referral_tree rt ON r.USER_ID = rt.REFERRER_ID
        )
        SELECT * FROM referral_tree;"""
        return await ReferralDatabase.query_database(ReferralDatabase(), query, (id_user,))
    
    @staticmethod
    async def update_data_ref_program_after_buy(all_referrers):
        users_id = [referrer[1] for referrer in all_referrers]
        users_id_str = ','.join(map(str, users_id))

        sql_update = "UPDATE referral SET "
        points_cases = "points = CASE"
        points_group_cases = "group_points = CASE"
        points_sop_cases = "sop = CASE"
        balance_cases = "balance = CASE"

        for referrer in all_referrers:
            points_cases += f" WHEN user_id = {referrer[1]} THEN {referrer[4]}"
            points_group_cases += f" WHEN user_id = {referrer[1]} THEN {referrer[5]}"
            points_sop_cases += f" WHEN user_id = {referrer[1]} THEN {referrer[6]}"
            balance_cases += f" WHEN user_id = {referrer[1]} THEN {referrer[9]}"  

        points_cases += " ELSE points END"
        points_group_cases += " ELSE group_points END"
        points_sop_cases += " ELSE sop END"
        balance_cases += " ELSE balance END"

        sql_update += f"{points_group_cases}, {points_sop_cases}, {points_cases}, {balance_cases} WHERE user_id IN ("
        sql_update += users_id_str + ");"

        await ReferralDatabase.query_database(ReferralDatabase(), sql_update)

    @staticmethod
    async def update_data_ref_program_after_bonus_calculate(all_referrers):
        users_id = [referrer.user_id for referrer in all_referrers]
        users_id_str = ','.join(map(str, users_id))

        sql_update = "UPDATE referral SET "
        points_cases = "points = CASE"
        group_points_cases = "group_points = CASE"
        sop_cases = "sop = CASE"
        status_cases = "status = CASE"
        last_status_cases = "last_status = CASE"
        balance_cases = "balance = CASE"
        potential_status_cases = "potential_status = CASE"

        for referrer in all_referrers:
            points_cases += f" WHEN user_id = {referrer.user_id} THEN 0"
            group_points_cases += f" WHEN user_id = {referrer.user_id} THEN 0"
            sop_cases += f" WHEN user_id = {referrer.user_id} THEN 0"
            status_cases += f" WHEN user_id = {referrer.user_id} THEN '{referrer.status}'"
            last_status_cases += f" WHEN user_id = {referrer.user_id} THEN '{referrer.last_status}'"
            balance_cases += f" WHEN user_id = {referrer.user_id} THEN {referrer.balance}"
            potential_status_cases += f" WHEN user_id = {referrer.user_id} THEN '{referrer.potential_status}'"

        points_cases += " ELSE points END"
        group_points_cases += " ELSE group_points END"
        sop_cases += " ELSE sop END"
        status_cases += " ELSE status END"
        last_status_cases += " ELSE last_status END"
        balance_cases += " ELSE balance END"
        potential_status_cases += " ELSE potential_status END"

        sql_update += f"{points_cases}, {group_points_cases}, {sop_cases}, {status_cases}, {last_status_cases}, {balance_cases}, {potential_status_cases} WHERE user_id IN ("
        sql_update += users_id_str + ");"

        await ReferralDatabase.query_database(ReferralDatabase(), sql_update)

    @staticmethod
    async def update_balance(id_user, balance):
        query = """UPDATE referral SET balance = %s WHERE user_id = %s"""
        await ReferralDatabase.query_database(ReferralDatabase(), query, (balance, id_user))
