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
            $number_code = 1;
            // var_dump($reader);



            for ($i = 1; $i < count($final_sheetData); $i++) {
                // var_dump($final_sheetData);
                // die();

                // $code = $final_sheetData[$i][0];
                $item = $final_sheetData[$i][0];
                $purchase_date = $final_sheetData[$i][1];
                $qty = $final_sheetData[$i][2];
                $unit = $final_sheetData[$i][3];
                $cost = $final_sheetData[$i][4];
                $cost_unit = $final_sheetData[$i][5];
                $tipe_inventory = $final_sheetData[$i][6];



                // change format become mysql format date (Y-m-ds)s
                $date = new DateTime($purchase_date);
                $final_purchase_date = $date->format("Y-m-d");


                //! Cek Ke database apakah code item sudah ada, kalau belum maka akan generate code item baru, jika item sudah pernah di buat kode itemnya, maka ambil code item tersebut.

                $query_get_all = "select * from tb_bahan_mentah";
                $get_all_data = $db->selectAll($query_get_all);
                // echo $item;


                if (mysqli_num_rows($get_all_data) > 0) {
                    $query_get_code_item = "SELECT * from tb_bahan_mentah where item='" . $item . "' limit 1";
                    $get_data_item = $db->selectAll($query_get_code_item);
                    // var_dump(mysqli_num_rows($get_data_item));
                    // die();
                    $result_data_item = mysqli_fetch_assoc($get_data_item);
                    if (mysqli_num_rows($get_data_item) > 0) {
                        $code_item = $result_data_item['code_item'];
                    } else {
                        $query_get_last_code = "select * from tb_bahan_mentah order by code_item desc limit 1";
                        $get_data_last_code = $db->selectAll($query_get_last_code);
                        $result_data_last_code = mysqli_fetch_assoc($get_data_last_code);
                        $last_code = $result_data_last_code['code_item'];
                        // var_dump($last_code);
                        $number_last_code = ltrim($last_code, "BM0");
                        $fix_last_code = $number_last_code + 1;
                        $code_item = "BM" . str_pad($fix_last_code, 10, 0, STR_PAD_LEFT);
                    }
                } else {
                    $code_item = "BM" . str_pad($number_code, 10, 0, STR_PAD_LEFT);
                }


                $query_insert_barang_mentah = "insert into tb_bahan_mentah set code_item='" . $code_item . "',item='" . $item . "',purchase_date='" . $final_purchase_date . "',qty='" . $qty . "',unit='" . $unit . "',cost='" . $cost . "',cost_unit='" . $cost_unit . "',uuid=UUID(),tipe_item='" . $tipe_inventory . "'";
                $result = $db->insert($query_insert_barang_mentah);
                $number_code++;
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
