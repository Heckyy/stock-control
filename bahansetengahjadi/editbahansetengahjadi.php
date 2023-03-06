<?php
require_once('../baseUrl.php');
require_once('../function/database.php');
$db = new Database();
$code_item  = $_GET['data'];
$query_get_data = "select distinct item, code_item from  tb_bahan_mentah";
$get_bahan_mentah = $db->selectAll($query_get_data);

// !Get Nama Item
$query_get_name_item = "SELECT * from tb_bahan_mentah where code_item='" . $code_item . "' limit 1";
$get_name_item = mysqli_fetch_assoc($db->selectAll($query_get_name_item));
$item = $get_name_item['item'];

// ! GET DATA INGREDIENTS SEMI GOOD MATERIAL FROM tb_bahan_sj

$query_get_data = "SELECT * from tb_bahan_sj where code_item='" . $code_item . "'";
$get_data = $db->selectAll($query_get_data);
foreach ($get_data as $data) {
    $code_bahan = $data['code_bahan'];
        // ! GET NAME RAW MATERIALS

        // $query_get_bm = "SELECT * from tb_bahan_mentah";
    ;
}
// var_dump($result);

$query_get_bm = "SELECT DISTINCT tb_bahan_sj.code_item as code_item , tb_bahan_sj.qty , tb_bahan_sj.code_bahan ,tb_bahan_mentah.item,tb_bahan_mentah.unit  FROM `tb_bahan_sj`JOIN tb_bahan_mentah ON tb_bahan_sj.code_bahan = tb_bahan_mentah.code_item WHERE tb_bahan_sj.code_item = '" . $code_item . "'";
// $get_data_bm = mysqli_fetch_assoc($db->selectAll($query_get_bm));
$get_data_bm = $db->selectAll($query_get_bm);
// foreach ($get_data_bm as $data) {
//     var_dump($data);
// }

// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventory</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/paginationjs@2.1.8/dist/pagination.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/main.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
            <h1><a href="index.html" class="logo">Inventory</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="<?= BASE_URL ?>../../../bahanmentah.php"> Bahan Mentah</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../bahanjadi/bahan_jadi.php"> Bahan Jadi</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../index.php"> COGS</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="app-card-header p-3 main-content container-fluid ">
                <div class="row justify-content-between align-items-center line">
                    <div class="col-auto">
                        <h4 class="app-card-title">
                            Buat Barang Setengah Jadi
                        </h4>
                    </div>
                </div>
                <hr style="height: 2px; border: none; color: black; background-color: black;">
            </div>

            <div class="app-card-body pb-3 main-content container-fluid">
                <form method="POST" id="new">
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Kode Item
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <input type="text" name="number" id="number" class="form-control square" required="required" disabled="disabled" value="<?= $code_item; ?>">
                        </div>
                        <div class="col-sm-2 col-lg-2" align="right">
                            Tanggal
                        </div>
                        <!-- <div class="col-sm-2 col-lg-2">
								<input type="date" name="tanggal" id="tanggal"  class="form-control square">
							</div> -->
                        <div class="col-sm-2 col-lg-2">
                            <input type="date" name="tanggal" id="tanggal" class="form-control square" required="required" disabled="disabled" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Item Name
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" style="border:thin solid black" id="name_item" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?php echo $item; ?> " disabled="disabled">
                            </div>

                        </div>
                    </div>
                    <div class=" space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Ingredients <a href="#" data-bs-toggle="modal" data-bs-target="#tambah_barang"><i class="bi bi-plus-circle"></i></a>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <select onchange="getItem();" class="js-select2" name="item" style="width: 208px;" id="item">
                                <option value="null">Select</option>
                                <?php
                                foreach ($get_bahan_mentah as $data) { ?>

                                    <option value="<?= $data['code_item'] ?>"><?= $data['item'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-sm-1 col-lg-1" align="right">
                            Qty
                        </div>
                        <div class="col-sm-2 col-lg-2">
                            <input type="number" name="qty" id="qty" min="1" class="form-control square" required="required" style="border:1px solid black;">
                        </div>
                        <div class="col-sm-1 col-lg-1" align="right">
                            Unit
                        </div>
                        <div class="col-sm-2 col-lg-2" style="width: 75px;">
                            <input type="text" name="unit" id="unit" class="form-control square" required="required" style="border:1px solid black;" disabled="disabled">
                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-lg-12">
                            <button type="submit" id="save" class="btn btn-sm btn-success btn-custom">Add Ingredient</button>
                        </div>
                    </div>
                </form>

                <table class="table mb-0 mt-5">
                    <thead>
                        <tr>
                            <td width="50px" align="center">No</td>
                            <td width="250px" class="text-center">Item</td>
                            <td width="100px" class="text-center">Qty</td>
                            <td width="100px" class="text-center">Unit</td>
                            <td width="200px" class="text-center">Reference Cost</td>
                            <td class="text-center" width="150px">Average Cost</td>
                            <td width="200px" class="text-center">Last Buy Cost</td>
                            <td width="50px" class="text-center" align="center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_data_bm as $data_bm) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $data_bm['item']; ?></td>
                                <td class="text-center"><?= $data_bm['qty']; ?></td>
                                <td class="text-center"><?= $data_bm['unit']; ?></td>
                            </tr>
                        <?php $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="pagination-container"></div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>../../../js/main.js"></script>
    <script src="function.js"></script>
    <script src="main.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-select2').select2();
        });
    </script>
</body>

</html>