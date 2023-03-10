<?php
require_once "../function/database.php";
// new Database();
// die();

// var_dump($_POST);
if (isset($_POST)) {
    $code_item_bsj = $_POST['code_bsj'];
    $get_periode = new DateTime();
    $periode = $get_periode->format("m/Y");
    $db = new Database();
    $code_item_bahan = $_POST['code_item'];
    $nama_item = $_POST['nama_item'];
    $qty = $_POST['qty'];
    $output = $_POST['output'];
    $output_unit = $_POST['output_unit'];
    // echo $output . " " . $output_unit;
    // die();
    // echo $code_item . " " . $nama_item . " " . $qty;

    // ! Get Average cost ,  reference cost and last buy cost from tb_cogs_bm!

    $query = "SELECT * from tb_cogs_bm where code_item='" . $code_item_bahan . "'";
    $get_data = $db->selectAll($query);
    $result = mysqli_fetch_assoc($get_data);
    // var_dump($result);

    //! Process Calculating Average Cost , Reference Cost And Lastbuy Cost
    $last_buy_cost = $result['last_buy_unit'];
    $avg_cost = $result['average_cost_unit'];
    $reference_cost = $result['reference_cost_unit'];

    $total_last_buy_cost = intval($qty) * intval($last_buy_cost);
    $total_avg_cost = intval($qty) * intval($avg_cost);
    $total_reference_cost = intval($qty) * intval($reference_cost);


    // echo "Last Buy Cost : " . $total_last_buy_cost . " Average Cost : " . $total_avg_cost . " Reference Cost : " . $total_reference_cost;

    // ! Process Insert Data Into tb_cogs_bm
    $query_insert_cogs = "INSERT INTO ";

    //! Process To Insert Data Into tb_bahan_mentah!
    $query_insert_bm = "INSERT INTO tb_bahan_mentah SET uuid=uuid(),item='" . $nama_item . "', tipe_item='Semi Good Material',code_item='" . $code_item_bsj . "',qty='" . $output . "',unit='" . $output_unit . "'";
    $db->insert($query_insert_bm);
    // ! Process To Insert Data INTO tb_bahan_sj
    $query_insert = "INSERT INTO tb_bahan_sj SET uuid=uuid(),code_bahan='" . $code_item_bahan . "',code_item='" . $code_item_bsj . "',qty='" . $qty . "'";
    $db->insert($query_insert);

    // var_dump($final_result);
} else {
    echo "tidak ada data";
}

echo $code_item_bsj;
