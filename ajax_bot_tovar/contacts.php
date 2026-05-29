<?
//сюда летит аякс запрос, в нем передается id номера запроса, получить по нему список каталога из бд postgresql из таблицы response_seller при этом id = hash_response в таблице
header('Access-Control-Allow-Origin: *');

$link = $_GET['link'];

$host     = getenv("DB_HOST")     ?: "localhost";
$dbname   = getenv("DB_NAME")     ?: "botTovar";
$user     = getenv("DB_USER")     ?: "postgres";
$password = getenv("DB_PASSWORD") ?: "";
$port     = getenv("DB_PORT")     ?: "5432";


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

$result = pg_query_params($db, "SELECT * FROM categories_search WHERE link = $1", array($link));
$resultAr = pg_fetch_assoc($result);
$arIdSeller = explode(',', $resultAr['result']);

if (pg_num_rows($result) > 0) {
    foreach ($arIdSeller as $idSeller) {
        $result_contact = pg_query_params($db, "SELECT * FROM contacts WHERE user_id = $1 AND LOWER(contacts_type) != 'phone'", [$idSeller]);
        while ($row_contact = pg_fetch_assoc($result_contact)) {
            $data[] = $row_contact;
        }
        $result_location = pg_query_params($db, "SELECT * FROM location WHERE user_id = $1", [(int) $idSeller]);
        $contract = pg_fetch_assoc($result_location);
        $data['location'][] = $contract;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
} else {    
    echo "0";
}

pg_close($db);

?>