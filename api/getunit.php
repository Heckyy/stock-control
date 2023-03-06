<?php

require_once "../function/database.php";

// new Database();

$db = new Database();
// ! Get UNIT from tb_bahan_mentah!
$item = $_POST['nama_item'];
$query_get_unit = "SELECT unit from tb_bahan_mentah where code_item='" . $item . "' limit 1";
$get_data = $db->selectAll($query_get_unit);
$result = mysqli_fetch_assoc($get_data);
$unit = strtolower($result['unit']);
// echo mysqli_num_rows($get_data);
echo $unit;
// echo $item;
