<?php

require_once('../function/database.php');
$db = new Database();


// !Get Periode

$periode = $_POST['periode'];


// !Get Code Item From tb_bahan_mentah!

$query_get_code_bm = "SELECT * from tb_bahan_mentah";
$get_data_code_bm = $db->selectAll($query_get_code_bm);
// var_dump($get_data_code_bm);

foreach ($get_data_code_bm  as $data) {
    $code_item = $data['code_item'];
    $reference_cost = $data['cost'];
    $reference_cost_unit = $data['cost_unit'];

    // ! Query GET Average Cost Unit !
    $query_get_avg_item_cost  = "SELECT  AVG(cost_unit) as avg_cost_unit FROM tb_bahan_mentah where code_item ='" . $code_item . "'ORDER BY code_item";
    $get_avg_item_cost = $db->selectAll($query_get_avg_item_cost);
    $result_avg_unit = mysqli_fetch_assoc($get_avg_item_cost);
    $avg_cost_unit = $result_avg_unit['avg_cost_unit'];


    //! Query GET Last Buy Cost Unit !
    $query_get_lastbuy_cost_item_unit = "SELECT cost_unit as last_buy_cost_unit FROM `tb_bahan_mentah` where code_item = '" . $code_item . "' ORDER BY purchase_date DESC limit 1";
    $get_data_lastbuy_item_unit = $db->selectAll($query_get_lastbuy_cost_item_unit);
    $result_lastbuy_item_unit = mysqli_fetch_assoc($get_data_lastbuy_item_unit);
    $last_buy_cost_unit = $result_lastbuy_item_unit['last_buy_cost_unit'];


    //! Query Get Average item!
    $query_get_avg_item  = "SELECT  AVG(cost) as avg_cost FROM tb_bahan_mentah where code_item ='" . $code_item . "'ORDER BY code_item";
    $get_avg_item = $db->selectAll($query_get_avg_item);
    $result_avg = mysqli_fetch_assoc($get_avg_item);
    $avg_cost = $result_avg['avg_cost'];

    // ! Query Get last buy cost
    $query_get_lastbuy_cost_item = "SELECT cost as last_buy_cost FROM `tb_bahan_mentah` where code_item = '" . $code_item . "' ORDER BY purchase_date DESC limit 1";
    $get_data_lastbuy = $db->selectAll($query_get_lastbuy_cost_item);
    $result_lastbuy = mysqli_fetch_assoc($get_data_lastbuy);
    $last_buy_cost = $result_lastbuy['last_buy_cost'];

    //! Check code item in cogs, If already exists, run query update, if it doesnt already -> run query insert data

    $query_cek_code_item = "Select * from tb_cogs_bm where code_item='" . $code_item . "'";
    $get_cek_code_item = $db->selectAll($query_cek_code_item);
    if (mysqli_num_rows($get_cek_code_item) > 0) {
        $query_update_cogs = "UPDATE  tb_cogs_bm SET  average_cost='" . $avg_cost . "',last_buy_cost='" . $last_buy_cost . "', average_cost_unit='" . $avg_cost_unit . "',last_buy_unit='" . $last_buy_cost_unit . "' where code_item='" . $code_item . "'";
        $result = $db->update($query_update_cogs);
    } else {
        // ! Query INSERT data to table cogs!
        $query_insert_cogs = "INSERT INTO tb_cogs_bm SET code_item='" . $code_item . "',uuid=uuid(),periode='" . $periode . "',reference_cost='" . $reference_cost . "',reference_cost_unit='" . $reference_cost_unit . "',average_cost='" . $avg_cost . "',last_buy_cost='" . $last_buy_cost . "',average_cost_unit='" . $avg_cost_unit . "',last_buy_unit='" . $last_buy_cost_unit . "'";
        $result = $db->insert($query_insert_cogs);
    }


    // $periode;
}
echo $result;

// $date = new DateTime();
// $result_date = $date->format("d-m-Y");
// echo $result_date;
