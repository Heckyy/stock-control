<?php
require_once("../function/database.php");
require_once("../function/rupiah.php");
$type = $_POST['type'];
$db = new Database();
$format = new Rupiah();

if ($type == "Raw") {
    $query_get_raw = "SELECT distinct tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost, tb_cogs_bm.last_buy_unit as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item where tb_bahan_mentah.tipe_item='Raw Material'";
    $result_data = $db->selectAll($query_get_raw);
    foreach ($result_data as $data) {
        $final_result[] = [
            "code_item" => $data['code_item'],
            "name_item" => $data['nama_item'],
            "tipe_item" => $data['tipe_item'],
            "reference_cost" => $format->format($data['reference_cost']),
            "avg_cost" => $format->format($data['average_cost']),
            "last_buy_cost" => $format->format($data['last_buy_cost'])
        ];
    }
    echo json_encode($final_result, JSON_PRETTY_PRINT);
} elseif ($type == "Semi") {
    $query_get_semi = "SELECT distinct tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost, tb_cogs_bm.last_buy_unit as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item where tb_bahan_mentah.tipe_item='Semi Good Material'";
    $result_data = $db->selectAll($query_get_semi);
    foreach ($result_data as $data) {
        $final_result[] = [
            "code_item" => $data['code_item'],
            "name_item" => $data['nama_item'],
            "tipe_item" => $data['tipe_item'],
            "reference_cost" => $format->format($data['reference_cost']),
            "avg_cost" => $format->format($data['average_cost']),
            "last_buy_cost" => $format->format($data['last_buy_cost'])
        ];
    }
    echo json_encode($final_result, JSON_PRETTY_PRINT);
} elseif ($type == "Good") {
    $query_get_good = "SELECT distinct tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost, tb_cogs_bm.last_buy_unit as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item where tb_bahan_mentah.tipe_item='Good Material'";
    $result_data = $db->selectAll($query_get_good);
    foreach ($result_data as $data) {
        $final_result[] = [
            "code_item" => $data['code_item'],
            "name_item" => $data['nama_item'],
            "tipe_item" => $data['tipe_item'],
            "reference_cost" => $format->format($data['reference_cost']),
            "avg_cost" => $format->format($data['average_cost']),
            "last_buy_cost" => $format->format($data['last_buy_cost'])
        ];
    }
    echo json_encode($final_result, JSON_PRETTY_PRINT);
} else {
    $query_get_all = "SELECT distinct tb_bahan_mentah.code_item as code_item, tb_bahan_mentah.item as nama_item , tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost, tb_cogs_bm.last_buy_unit as last_buy_cost FROM `tb_bahan_mentah` JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item";
    $result_data = $db->selectAll($query_get_all);
    foreach ($result_data as $data) {
        $final_result[] = [
            "code_item" => $data['code_item'],
            "name_item" => $data['nama_item'],
            "tipe_item" => $data['tipe_item'],
            "reference_cost" => $format->format($data['reference_cost']),
            "avg_cost" => $format->format($data['average_cost']),
            "last_buy_cost" => $format->format($data['last_buy_cost'])
        ];
    }
    echo json_encode($final_result, JSON_PRETTY_PRINT);
}
