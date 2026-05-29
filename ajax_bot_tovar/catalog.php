<?
//сюда летит аякс запрос, в нем передается id номера запроса, получить по нему список каталога из бд postgresql из таблицы response_seller при этом id = hash_response в таблице
header('Access-Control-Allow-Origin: *');

$hash_response = $_GET['hash_response'];

$host     = getenv("DB_HOST")     ?: "localhost";
$dbname   = getenv("DB_NAME")     ?: "botTovar";
$user     = getenv("DB_USER")     ?: "postgres";
$password = getenv("DB_PASSWORD") ?: "";
$port     = getenv("DB_PORT")     ?: "5432";


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

$result = pg_query_params($db, "SELECT * FROM response_seller WHERE hash_response = $1", array($hash_response));

if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $result_contact = pg_query_params($db, "SELECT * FROM contacts WHERE user_id = $1 AND LOWER(contacts_type) != 'phone'", array($row['id_seller']));
        while ($row_contact = pg_fetch_assoc($result_contact)) {
            $row['contact'][] = $row_contact;
        }
        $data[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
} else {    
    echo "0";
}

pg_close($db);

?>