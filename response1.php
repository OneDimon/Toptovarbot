<?php
$response_code = $_GET['response_code'];

$host = "localhost";
$dbname = "botTovar";
$user = "postgres";
$password = "qwer1234";
$port = "5432";

$postgress = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

$result = pg_query_params($postgress, "SELECT * FROM request_response_seller WHERE hash_request = $1", array($response_code));
$result = pg_fetch_all($result);

$response = [];

foreach ($result as $key => $value)
{
    $hash_response = $value['response'];
    $rows = pg_fetch_all(pg_query_params($postgress, "SELECT * FROM response_seller WHERE hash_response = $1", array($hash_response)));
    if ($rows) {
        $response = array_merge($response, $rows);
    }
}
?>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th {
    background-color: #f2f2f2;
}
img {
    max-width: 300px;
    height: auto;
}
body {
    background: linear-gradient(to bottom, #f2f2f2 0%, #d9d9d9 100%);
}
</style>

<table>
    <thead>
        <tr>
            <th>Название продукта</th>
            <th>Цена продукта</th>
            <th>Фотография товара</th>
        </tr>
    </thead>
    <tbody>
        <?foreach ($response as $key => $value) { ?>
        <tr>
            <td><?= htmlspecialchars($value['name_product']) ?></td>
            <td><?= htmlspecialchars($value['price']) ?></td>
            <td><img src="<?= "http://opttovar/" . htmlspecialchars($value['link_photo'])?>" alt="<?= htmlspecialchars($value['name_product']) ?>" /></td>
        <?}?>
    </tbody>
</table>
