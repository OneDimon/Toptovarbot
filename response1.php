<?php
$response_code = $_GET['response_code'];
$postgress = pg_connect('host=localhost port=5432 dbname=botTovar user=postgres password=qwer1234');
#получить данные из таблицы request_response_seller, при условии, что поле hash_request = $response_code
$result = pg_query($postgress, "SELECT * FROM request_response_seller WHERE hash_request = '$response_code'");
$result = pg_fetch_all($result);
$response = [];
foreach ($result as $key => $value) 
{   
    $hash_response = $value['response'];
    $response = array_merge($response, pg_fetch_all(pg_query($postgress, "SELECT * FROM response_seller WHERE hash_response = '$hash_response'")));
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
        <td><?= $value['name_product'] ?></td>
        <td><?= $value['price'] ?></td>
        <td><img src="<?= "http://opttovar/" . $value['link_photo']?>" alt="<?= $value['name_product'] ?>" /></td>
        <?}?>
  </tbody>
</table>
