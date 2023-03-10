<?php

require_once "../function/database.php";

// var_dump($_POST);
$db = new Database();
$get_periode = new DateTime();
$periode = $get_periode->format("m/Y");
$code_item = $_POST['code_item'];
$reference_cost = $_POST['reference_cost'];
$average_cost = $_POST['average_cost'];
$lastbuy_cost = $_POST['lastbuy_cost'];

// ! Check KE DB apakah sudah pernah membuat menu!
$query_cek_menu = "SELECT * from tb_cogs_bm where code_item='" . $code_item . "'";
$result = $db->selectAll($query_cek_menu);
if (mysqli_num_rows($result) > 0) {
    // !Update Menu!
    $query_update_menu = "UPDATE tb_cogs_bm SET periode='" . $periode . "',reference_cost='" . $reference_cost . "',average_cost='" . $average_cost . "',last_buy_cost='" . $lastbuy_cost . "' where code_item='" . $code_item . "'";
    // $query_update_menu = "UPDATE tb_cogs_bm  where code_item'"
    if ($db->update($query_update_menu)) {
        echo "Anda Berhasil Update Menu!";
    } else {
        echo "Anda Gagal Update Menu!";
    }
} else {
    // ! Create New Menu!

    $query_insert = "INSERT INTO tb_cogs_bm set uuid= uuid(), periode='" . $periode . "', code_item='" . $code_item . "',reference_cost='" . $reference_cost . "',average_cost='" . $average_cost . "',last_buy_cost='" . $lastbuy_cost . "'";

    if ($db->insert($query_insert)) {
        echo "Anda Berhasil Memasukan Menu!";
    } else {
        echo "Anda Gagal Memasukan Menu!";
    }
}
