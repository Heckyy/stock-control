<?php

require_once "../function/database.php";

$db = new Database();

// ! GET DATA SEMI GOOD MATERIALS
$query_get_data = "SELECT distinct code_item,item from tb_bahan_mentah where code_item like '%BSJ%'order by code_item ASC";
$get_data = $db->selectAll($query_get_data);

foreach ($get_data as $data) {
    $total_reference_cost = 0;
    $total_average_cost = 0;
    $total_lastbuy_cost = 0;
    $code_item_bsj = $data['code_item'];
    // $qty = $data['qty'];
    $query_get_bm = "SELECT DISTINCT tb_bahan_sj.code_item as code_item , tb_bahan_mentah.code_item as code_item_bm, tb_bahan_sj.qty , tb_bahan_sj.code_bahan ,tb_bahan_mentah.item,tb_bahan_mentah.unit,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit AS average_cost, tb_cogs_bm.last_buy_unit as last_buy_cost FROM `tb_bahan_sj`JOIN tb_bahan_mentah ON tb_bahan_sj.code_bahan = tb_bahan_mentah.code_item JOIN tb_cogs_bm on tb_bahan_mentah.code_item = tb_cogs_bm.code_item  WHERE tb_bahan_sj.code_item = '" . $code_item_bsj . "'";
    $results = $db->selectAll($query_get_bm);
    foreach ($results as $result) {
        $reference_cost_fix = intval($result['reference_cost']) *  intval($result['qty']);
        $average_cost_fix = intval($result['average_cost']) *  intval($result['qty']);
        $last_buy_cost_fix = intval($result['last_buy_cost']) *  intval($result['qty']);

        $total_reference_cost += $reference_cost_fix;
        $total_average_cost += $average_cost_fix;
        $total_lastbuy_cost += $last_buy_cost_fix;


        var_dump($total_reference_cost . " " . $total_average_cost . " " . $total_average_cost);
    }


    // die();
}



























// $query_get_data = "SELECT tb_bahan_sj.code_item as code_item , tb_bahan_sj.code_bahan as code_bahan, tb_bahan_sj.qty as qty , tb_cogs_bm.reference_cost_unit as reference_cost, tb_cogs_bm.average_cost_unit as average_cost ,tb_cogs_bm.last_buy_unit as lastbuy_cost from tb_bahan_sj JOIN tb_cogs_bm on tb_bahan_sj.code_bahan = tb_cogs_bm.code_item";
// $get_data = $db->selectAll($query_get_data);
// foreach ($get_data as $data) {
//     $code_bsj = $data['code_item'];
//     $qty = $data['qty'];
//     $reference_cost = $data['reference_cost'] * $qty;
//     // $average_cost
//     // $total_cost += $reference_cost;
//     echo "KODE ITEM : " . $code_bsj . "HARGA : " . $total_cost . PHP_EOL;
//     $total_cost = 0;
    // echo "Kode Item : " . $code_bsj . PHP_EOL;
    // echo "Kode Bahan : " . $data['code_bahan'] . " HARGA : " . $total_cost;
// }
// $result[] = $get_data;
