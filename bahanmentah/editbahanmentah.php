<?php
require_once('../baseUrl.php');
require_once('../function/database.php');
require_once('../function/rupiah.php');
$db = new Database();
$rp = new Rupiah();
$code_item  = $_GET['data'];

$query_get_bm = "SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item as item,tb_bahan_mentah.tipe_item as tipe_item ,tb_cogs_bm.reference_cost_unit as reference_cost_unit ,tb_bahan_mentah.qty as qty, tb_bahan_mentah.unit as unit, tb_cogs_bm.reference_cost as reference_cost FROM `tb_bahan_mentah` inner JOIN tb_cogs_bm on tb_cogs_bm.code_item = tb_bahan_mentah.code_item where tb_bahan_mentah.code_item = '" . $code_item . "' order by tb_bahan_mentah.purchase_date ASC limit 1";
$results = $db->selectAll($query_get_bm);
$result = mysqli_fetch_assoc($results);
// var_dump($result);



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <li class="">
                    <a href="../purchasing/purchasing.php"> Purchasing</a>
                </li>
                <li class="">
                    <a href="<?= BASE_URL ?>../../../bahanmentah.php">Raw Materials</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../bahansetengahjadi/bahan_setengah_jadi.php"> Semi Good Materials</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../bahanjadi/bahan_jadi.php"> Finished Good Materials</a>
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
                            Edit Raw Materials
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
                                <input type="text" class="form-control" style="border:thin solid black" id="name_item" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?php echo $result['item']; ?> " disabled="disabled">
                            </div>

                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Qty
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" style="border:thin solid black" id="qty" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?php echo $result['qty'] . " " . $result['unit']; ?> " disabled="disabled">
                            </div>

                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Reference Cost
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" style="border:thin solid black" id="reference_cost" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?= intval($result['reference_cost']) ?>">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Reference Cost/Unit
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" style="border:thin solid black" id="reference_cost_unit" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?= intval($result['reference_cost_unit']); ?>">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-lg-12">
                            <button type="submit" id="save" class="btn btn-sm btn-success btn-custom">Update Cost</button>
                        </div>
                    </div>
                </form>
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