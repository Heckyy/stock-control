<?php

require_once __DIR__ . "/../function/database.php";
$db = new Database();

// $query_get_data = "SELECT * from tb_bahan_mentah where code_item like '%BM%' order by purchase_date DESC";
$query_get_data = "SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item as item,tb_bahan_mentah.tipe_item as tipe_item,tb_bahan_mentah.unit as unit,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost,tb_cogs_bm.last_buy_unit as lastbuy_cost FROM `tb_bahan_mentah` inner JOIN tb_cogs_bm ON tb_cogs_bm.code_item = tb_bahan_mentah.code_item where tb_bahan_mentah.code_item like'%BM%'";
$result = $db->selectAll($query_get_data);
$final_result = mysqli_fetch_assoc($result);

foreach ($result as $data) {

    $json[] = [

        $code_item = $data['code_item'],
        $item = $data['item'],
        $tipe_item = $data['tipe_item'],
        $unit = $data['unit'],
        $reference_cost = $data['reference_cost'],
        $average_cost = $data['average_cost'],
        $lastbuy_cost = $data['lastbuy_cost'],


    ];
}

echo json_encode($json, JSON_PRETTY_PRINT);
// var_dump($json);
// var_dump($final_result);
