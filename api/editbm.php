<?php
require_once "../function/database.php";
$db = new Database();

$code_item = $_POST['code_item'];
$item_name = $_POST['item_name'];
$reference_cost = $_POST['reference_cost'];
$reference_cost_unit=$_POST['reference_cost_unit'];

// echo $code_item . " " . $item_name . " ".$reference_cost." " . $reference_cost_unit;

// ! Query Update Into tb_cogs_bm!
$query_update = "UPDATE tb_cogs_bm SET reference_cost='".$reference_cost."',reference_cost_unit='".$reference_cost_unit."' where code_item='".$code_item."'";
$update_data = $db->update($query_update);
if($update_data){
    echo "Update Berhasil";
}else{
    echo  "Update Gagal";
}
