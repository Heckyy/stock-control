<?php

require_once "../function/database.php";

// Create Object
$db = new Database();

// ! QUERY
// SELECT tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost as reference_cost,tb_cogs_bm.average_cost as average_cost, tb_cogs_bm.last_buy_cost as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item 

// ! Get Data COGS raw materials, semi good materials and good materials!

$query_get_data = "SELECT tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost as reference_cost,tb_cogs_bm.average_cost as average_cost, tb_cogs_bm.last_buy_cost as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item ";

$result_data = $db->selectAll($query_get_data);

foreach ($result_data as $data) {
    $final_result[] = [
        "code_item" => $data['code_item'],
        "name_item" => $data['nama_item'],
        "tipe_item" => $data['tipe_item'],
        "reference_cost" => $data['reference_cost'],
        "avg_cost" => $data['average_cost'],
        "last_buy_cost" => $data['last_buy_cost']
    ];
}
echo json_encode($final_result, JSON_PRETTY_PRINT);
