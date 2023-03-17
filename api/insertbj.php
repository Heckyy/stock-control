<?php

require_once "../function/database.php";

$db = new Database();
if(isset($_POST)){
    $code_item = $_POST['code_item'];
    $item = $_POST['item'];
    $code_bahan = $_POST['bahan'];
    $qty = $_POST['qty'];

    // !Insert Into tb_bahan_sj!
    $query_insert_bahan_sj = "INSERT INTO tb_bahan_sj SET uuid=UUID(),code_item='".$code_item."',code_bahan='".$code_bahan."',qty='".$qty."'";
    $db->insert($query_insert_bahan_sj);

    // !Insert Into tb_bahan_mentah
    $query_insert_bahan_mentah = "INSERT INTO tb_bahan_mentah SET uuid=UUID(),code_item='".$code_item."',item='".$item."',tipe_item='Good Material'";
    $db->insert($query_insert_bahan_mentah);
}

echo $code_item;