<?php

use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

require_once("../baseUrl.php");
require_once "../function/database.php";
require_once "../function/rupiah.php";

//! Get data purchasing from tb_bahan_mentah!
$format = new Rupiah();


$db = new Database();
$query_get_data = "SELECT * from tb_bahan_mentah where code_item like '%BM%' order by purchase_date DESC";
$result_get_data = $db->selectAll($query_get_data);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventory</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <script src="https://cdn.jsdelivr.net/npm/paginationjs@2.1.8/dist/pagination.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="index.php" class="logo">COGS</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="">
                    <a href="purchasing/purchasing.php">Purchasing</a>
                </li>
                <li class="">
                    <a href="../bahanmentah.php"> Bahan Mentah</a>
                </li>
                <li>
                    <a href="../bahansetengahjadi/bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
                </li>
                <li>
                    <a href="../bahanjadi/bahan_jadi.php"> Bahan Jadi</a>
                </li>
                <li>
                    <a href="../index.php">COGS</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">List Purchasing</h2>
            <a href="../bahanmentah/tambah_bahan_mentah.php"> <button class="btn btn-primary mb-lg-3">Tambah Item</button></a>
            <div class="text-right"><a href="../public/template-raw-materals.xlsx">Download Template</a></div>
            <div class="last-update text-right">Last Update COGS : <span id="last-cogs"></span></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Number</th>
                        <th scope="col" class="text-center">Code</th>
                        <th scope="col" class="text-center">Item</th>
                        <th scope="col" class="text-center">Purchase Date</th>
                        <th scope="col" class="text-center">Qty</th>
                        <th scope="col" class="text-center">Unit</th>
                        <th scope="col" class="text-center">Cost</th>
                        <th scope="col" class="text-center">Cost / Unit</th>
                    </tr>
                </thead>
                <tbody class="data-table" id="data-table">
                    <?php
                    $no = 1;
                    foreach ($result_get_data as $data) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td class="text-center"><?= $data['code_item'] ?></td>
                            <td class="text-center"><?= $data['item'] ?></td>
                            <td class="text-center"><?= $data['purchase_date'] ?></td>
                            <td class="text-center"><?= $data['qty'] ?></td>
                            <td class="text-center"><?= $data['unit'] ?></td>
                            <td class="text-center"><?= $format->format($data['cost']) ?></td>
                            <td class="text-center"><?= $format->format($data['cost_unit']) ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="pagination-container"></div>
    </div>


    <script src="../js/popper.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="bahanmentah/main.js"></script>
</body>

</html>