<?
//сюда летит аякс запрос, в нем передается id номера запроса, получить по нему список каталога из бд postgresql из таблицы response_seller при этом id = hash_response в таблице
header('Access-Control-Allow-Origin: *');

$link = $_GET['link'];

$host = "localhost";
$dbname = "botTovar";
$user = "postgres";
$password = "qwer1234";
$port = "5432";


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

$result = pg_query_params($db, "SELECT * FROM categories_search WHERE link = $1", array($link));
$resultAr = pg_fetch_assoc($result);
$arIdSeller = explode(',', $resultAr['result']);

if (pg_num_rows($result) > 0) {
    foreach ($arIdSeller as $idSeller) {
        $result_contact = pg_query_params($db, "SELECT * FROM contacts WHERE user_id = $1 AND LOWER(contacts_type) != 'phone'", [$idSeller]);
        while ($row_contact = pg_fetch_assoc($result_contact)) {
            $row[] = $row_contact;
        }
        $data = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
} else {    
    echo "0";
}

pg_close($db);

?>