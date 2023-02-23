<?php
require_once('../vendor/autoload.php');
require_once('../baseUrl.php');
require_once('../function/database.php');

use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_FILES)) {


    $db = new Database();

    $data = $_FILES['file_excel'];
    $name = $data['name'];
    $explode_name = explode(".", $name);
    $ext = end($explode_name);


    // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    // $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
    // $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $path_target = "../upload/";
    $target_file = $path_target . basename($_FILES["file_excel"]["name"]);
    // move_uploaded_file($_FILES['file_excel']['tmp_name'], $path_target);

    if (move_uploaded_file($_FILES['file_excel']['tmp_name'], $target_file)) {
        try {
            $path_upload = "../upload/" . $_FILES['file_excel']['name'];
            /** Load $inputFileName to a Spreadsheet Object  **/
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($path_upload);
            $sheetData = $spreadsheet->getActiveSheet();
            $final_sheetData = $sheetData->toArray();
            $count_col = count($final_sheetData);
            // var_dump($reader);

            for ($i = 1; $i < count($final_sheetData); $i++) {
                $code = $final_sheetData[$i][0];
                $item = $final_sheetData[$i][1];
                $purchase_date = $final_sheetData[$i][2];
                $qty = $final_sheetData[$i][3];
                $unit = $final_sheetData[$i][4];
                $cost = $final_sheetData[$i][5];
                $cost_unit = $final_sheetData[$i][6];

                // change format become mysql format date (Y-m-ds)s
                $date = new DateTime($purchase_date);
                $final_purchase_date = $date->format("Y-m-d");


                $query_insert_barang_mentah = "insert into tb_bahan_mentah set code_item='" . $code . "',item='" . $item . "',purchase_date='" . $final_purchase_date . "',qty='" . $qty . "',unit='" . $unit . "',cost='" . $cost . "',cost_unit='" . $cost_unit . "',uuid=UUID()";
                $result = $db->insert($query_insert_barang_mentah);
                // echo $db;
            }
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            die('Error loading file: ' . $e->getMessage());
        }


        // $spreadsheet =  IOFactory::load($_FILES['file_excel']['tmp_name']);
        // $worksheet = $spreadsheet->getActiveSheet();
        // $count_col = count($worksheet[0]);
    } else {
        echo "File upload failed, please try again.";
    }


    // if ($ext != "xlsx") {
    //     die("File Invalid");
    // } else {
    //     var_dump($data);
    // }
} else {
    echo "gagal";
}
