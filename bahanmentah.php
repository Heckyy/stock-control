<?php
require_once("baseUrl.php");
require_once "function/database.php";
require_once "function/rupiah.php";

$db = new Database();

$query_get_data = "SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item as item,tb_bahan_mentah.tipe_item as tipe_item,tb_bahan_mentah.unit as unit,tb_cogs_bm.reference_cost_unit as reference_cost,tb_cogs_bm.average_cost_unit as average_cost,tb_cogs_bm.last_buy_unit as lastbuy_cost FROM `tb_bahan_mentah` inner JOIN tb_cogs_bm ON tb_cogs_bm.code_item = tb_bahan_mentah.code_item where tb_bahan_mentah.code_item like'%BM%'";
$result = $db->selectAll($query_get_data);
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
  <link rel="stylesheet" href="css/style.css" />
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
          <a href="index.php"> Bahan Mentah</a>
        </li>
        <li>
          <a href="bahansetengahjadi/bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
        </li>
        <li>
          <a href="bahanjadi/bahan_jadi.php"> Bahan Jadi</a>
        </li>
        <li>
          <a href="index.php">COGS</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Bahan Mentah</h2>
      <a href="bahanmentah/tambah_bahan_mentah.php"> <button class="btn btn-primary mb-lg-3">Tambah Item</button></a>
      <button class="btn btn-primary mb-lg-3" id="update-cogs">Update COGS</button>
      <div class="text-right"><a href="public/template-raw-materals.xlsx">Download Template</a></div>
      <div class="last-update text-right">Last Update COGS : <span id="last-cogs"></span></div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">Number</th>
            <th scope="col" class="text-center">Code</th>
            <th scope="col" class="text-center">Item</th>
            <th scope="col" class="text-center">Unit</th>
            <th scope="col" class="text-center">Type Of Inventory</th>
            <th scope="col" class="text-center">Reference Cost</th>
            <th scope="col" class="text-center">Average Cost</th>
            <th scope="col" class="text-center">Lastbuy Cost</th>
          </tr>
        </thead>
        <tbody class="data-table">
          <?php
          $no = 1;
          foreach ($result as $data) : ?>
            <tr style="cursor:pointer">
              <td scope="row" s onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $no; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['code_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['unit']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['tipe_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['reference_cost']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['average_cost']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['lastbuy_cost']; ?></td>



            </tr>
          <?php $no++;
          endforeach; ?>

        </tbody>
      </table>
    </div>
    <div id="pagination-container"></div>
  </div>


  <script src="js/popper.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="bahanmentah/main.js"></script>
  <script src="bahanmentah/function.js"></script>
</body>

</html>