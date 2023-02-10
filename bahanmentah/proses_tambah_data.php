<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_FILES)) {

    $data = $_FILES['file_excel'];
    $name = $data['name'];
    $explode_name = explode(".", $name);
    $ext = end($explode_name);

    // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    // $spreadsheet = $reader->load($_FILES['file_excel']['tmp_name']);
    // $sheetData = $spreadsheet->getActiveSheet()->toArray();
    echo "ANJING";

    // $target_directory = "../upload/";
    // $target_file = $target_directory . basename($_FILES["file_excel"]["name"]);

    // if (move_uploaded_file($_FILES["file_excel"]["tmp_name"], $target_file)) {
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    // }


    // if ($ext != "xlsx") {
    //     die("File Invalid");
    // } else {
    //     var_dump($data);
    // }
}
