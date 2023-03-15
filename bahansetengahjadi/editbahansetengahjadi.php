<?php
require_once('../baseUrl.php');
require_once('../function/database.php');
require_once('../function/rupiah.php');
$db = new Database();
$rp = new Rupiah();
$code_item  = $_GET['data'];
$query_get_data = "select distinct item, code_item from  tb_bahan_mentah";
$get_bahan_mentah = $db->selectAll($query_get_data);


// !Get Nama Item
$query_get_name_item = "SELECT * from tb_bahan_mentah where code_item='" . $code_item . "' limit 1";
$get_name_item = mysqli_fetch_assoc($db->selectAll($query_get_name_item));
$item = $get_name_item['item'];
$qty_output = $get_name_item['qty'];
$output_unit = $get_name_item['unit'];

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

// SELECT DISTINCT tb_bahan_sj.code_item AS code_item,tb_bahan_sj.code_bahan as code_bahan ,tb_bahan_sj.qty as qty,tb_bahan_mentah.item as item,tb_bahan_mentah.unit as unit , tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost , tb_cogs_bm.last_buy_unit as lastbuy_cost FROM `tb_bahan_sj` JOIN tb_bahan_mentah ON tb_bahan_sj.code_bahan = tb_bahan_mentah.code_item JOIN tb_cogs_bm ON tb_bahan_sj.code_bahan = tb_cogs_bm.code_item WHERE tb_bahan_sj.code_item = "BSJ0000000001";

// SELECT DISTINCT tb_bahan_sj.code_item AS code_item,tb_bahan_sj.code_bahan as code_bahan ,tb_bahan_sj.qty as qty,tb_bahan_mentah.item as item,tb_bahan_mentah.unit as unit ,tb_bahan_mentah.qty as qty_output, tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost , tb_cogs_bm.last_buy_unit as lastbuy_cost FROM `tb_bahan_sj` JOIN tb_bahan_mentah ON tb_bahan_sj.code_bahan = tb_bahan_mentah.code_item OR tb_bahan_sj.code_item = tb_bahan_mentah.code_item JOIN tb_cogs_bm ON tb_bahan_sj.code_bahan = tb_cogs_bm.code_item WHERE tb_bahan_sj.code_item = "BSJ0000000001" AND tb_bahan_mentah.item LIKE"%Nasi putih%";

$query_get_bm = " SELECT DISTINCT tb_bahan_sj.code_item AS code_item,tb_bahan_sj.code_bahan as code_bahan ,tb_bahan_sj.qty as qty,tb_bahan_mentah.item as item,tb_bahan_mentah.unit as unit , tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost , tb_cogs_bm.last_buy_unit as lastbuy_cost FROM `tb_bahan_sj` JOIN tb_bahan_mentah ON tb_bahan_sj.code_bahan = tb_bahan_mentah.code_item JOIN tb_cogs_bm ON tb_bahan_sj.code_bahan = tb_cogs_bm.code_item WHERE tb_bahan_sj.code_item ='" . $code_item . "'";
// $get_data_bm = mysqli_fetch_assoc($db->selectAll($query_get_bm));
$get_data_bm = $db->selectAll($query_get_bm);




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
                    <a href="<?= BASE_URL ?>../../../bahanmentah.php"> Bahan Mentah</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
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
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Output
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" style="border:thin solid black" id="output" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?php echo $qty_output; ?> " disabled="disabled">
                            </div>

                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Unit Output
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" style="border:thin solid black" id="output_unit" aria-describedby="emailHelp" autocomplete="off" required="required" value="<?php echo $output_unit; ?> " disabled="disabled">
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
                            <td width="50px" align="center"><b>No</b></td>
                            <td width="250px" class="text-center"><b>Code</b></td>
                            <td width="250px" class="text-center"><b>Item</b></td>
                            <td width="100px" class="text-center"><b>Qty</b></td>
                            <td width="100px" class="text-center"><b>Unit</b></td>
                            <td width="200px" class="text-center"><b>Reference Cost</b></td>
                            <td class="text-center" width="150px"><b>Average Cost</b></td>
                            <td width="200px" class="text-center"><b>Last Buy Cost</b></td>
                            <td width="50px" class="text-center" align="center"><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_data_bm as $data_bm) :
                            $reference_cost = $data_bm['qty'] * $data_bm['reference_cost'];
                            $average_cost = $data_bm['qty'] * $data_bm['average_cost'];
                            $lastbuy_cost = $data_bm['qty'] * $data_bm['lastbuy_cost'];
                            $total_reference_cost += $reference_cost;
                            $total_average_cost += $average_cost;
                            $total_lastbuy_cost += $lastbuy_cost;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td id="code_bm" class="text-center"><?= $data_bm['code_bahan']; ?></td>
                                <td class="text-center"><?= $data_bm['item']; ?></td>
                                <td class="text-center"><?= $data_bm['qty']; ?></td>
                                <td class="text-center"><?= $data_bm['unit']; ?></td>
                                <td class="text-center"><?= $rp->format($reference_cost); ?></td>
                                <td class="text-center"><?= $rp->format($average_cost); ?></td>
                                <td class="text-center"><?= $rp->format($lastbuy_cost); ?></td>
                                <td  class="text-center" align="center"><button data-id = "<?=$data_bm['code_bahan'];?>" style="background-color: transparent; border:none;" onclick="deleteBahan(this)"><i class="fa-solid fa-trash"></i></button></td>
                            </tr>
                        <?php $no++;

                        endforeach;
                        ?>
                        <tr>
                            <td width="350px"><b>Total : </b> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id="reference_cost" class="text-center"><b><?= $rp->format($total_reference_cost); ?></b></td>
                            <td id="average_cost" class="text-center"><b><?= $rp->format($total_average_cost); ?></b></td>
                            <td id="lastbuy_cost" class="text-center"><b><?= $rp->format($total_lastbuy_cost); ?></b></td>

                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-lg-12"><button id="save-menu" class="btn btn-primary w-100">Save Menu</button></div>
                </div>
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