<?php

require_once __DIR__ . "/../function/database.php";
$db = new Database();

$query_get_data = "SELECT * from tb_bahan_mentah order by purchase_date DESC";
$result = $db->selectAll($query_get_data);
$final_result = mysqli_fetch_assoc($result);

foreach ($result as $data) {

    $json[] = [

        $number = $data['code_item'],
        $item = $data['item'],
        $purchase_date = $data['purchase_date'],
        $qty = $data['qty'],
        $unit = $data['unit'],
        $cost = $data['cost'],
        $cost_unit = $data['cost_unit'],


    ];
}

echo json_encode($json, JSON_PRETTY_PRINT);
// var_dump($json);
// var_dump($final_result);
