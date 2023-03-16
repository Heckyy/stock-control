<?php
require_once('../baseUrl.php');
require_once('../function/database.php');
$db = new Database();
$query_get_data = "select distinct item, code_item from tb_bahan_mentah where code_item like'%BSJ%' or code_item like'%BM%'";
$get_bahan_mentah = $db->selectAll($query_get_data);
// $result_get_data = mysqli_fetch_assoc($get_bahan_mentah);
$date = new DateTime();
$real_date = $date->format("d-m-Y");
$number_code = 1;
// echo $real_date;


// ! Create Code Item For Semi Good Materials

$query_get_code_item = "SELECT * from tb_bahan_mentah where code_item like '%BJ%' order by code_item DESC limit 1";
$get_code_item = $db->selectAll($query_get_code_item);
$result_code_item_bsj = mysqli_fetch_assoc($get_code_item);
if (mysqli_num_rows($get_code_item) > 0) {
    $code_item_bsj = $result_code_item_bsj['code_item'];
    $last_number = ltrim($code_item_bsj, "BM0");
    $new_number = $last_number + 1;
    $code_item_bsj = "BJ" . str_pad($new_number, 10, 0, STR_PAD_LEFT);
    // var_dump($code_item_bsj);
    // die();
} else {
    $code_item_bsj = "BJ" . str_pad($number_code, 10, 0, STR_PAD_LEFT);
}
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
    <link rel="stylesheet" href="style.css" />

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
                    <a href="<?= BASE_URL ?>../../../purchasing/purchasing.php"> Purchasing</a>
                </li>
                <li class="">
                    <a href="<?= BASE_URL ?>../../../bahanmentah.php"> Bahan Mentah</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../../bahansetengahjadi/bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>../../bahan_jadi.php"> Bahan Jadi</a>
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
                            <input type="text" name="number" id="number" class="form-control square" required="required" disabled="disabled" value="<?= $code_item_bsj; ?>">
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
                                <input type="text" class="form-control" style="border:thin solid black" id="name_item" aria-describedby="emailHelp" autocomplete="off" required="required">
                            </div>

                        </div>
                    </div>
                    
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Ingredients <a href="#" data-bs-toggle="modal" data-bs-target="#tambah_barang"><i class="bi bi-plus-circle"></i></a>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <select onchange="getItem();" class="js-select2" name="item" style="width: 205px;" id="item">
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
                            <button type="submit" id="save" class="btn btn-sm btn-primary btn-custom">Add Ingredient</button>
                        </div>
                    </div>
                </form>

                <table class="table mb-0 mt-5">
                    <thead>
                        <tr>
                            <td width="50px" align="center"><b>No</b></td>
                            <td width="250px" class="text-center"><b>Item</b></td>
                            <td width="200px" class="text-center"><b>Reference Cost</b></td>
                            <td class="text-center"><b>Average Cost</b></td>
                            <td width="200px" class="text-center"><b>Last Buy Cost</b></td>
                            <td width="150px" class="text-center" align="center"><b>Aksi</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">Data not found!</td>
                        </tr>
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