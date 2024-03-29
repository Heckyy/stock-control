<?php
require_once('../baseUrl.php');
require_once "../function/database.php";
require_once "../function/rupiah.php";
$db = new Database();
$rp = new Rupiah();
// ! Get Data BSJ!
// $query_get_bsj = "SELECT distinct code_item,item,tipe_item,qty,unit,cost,cost_unit from tb_bahan_mentah where code_item like '%BSJ%' order by code_item ASC";
// SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item AS item,tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_unit, tb_cogs_bm.average_cost_unit AS average_cost_unit,tb_cogs_bm.last_buy_unit as lastbuy_unit FROM `tb_bahan_mentah` INNER JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item WHERE tb_bahan_mentah.code_item like"%BSJ%";
$query_get_bsj = "SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item AS item,tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_unit, tb_cogs_bm.average_cost_unit AS average_cost_unit,tb_cogs_bm.last_buy_unit as lastbuy_unit,tb_bahan_mentah.unit as unit FROM `tb_bahan_mentah` INNER JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item WHERE tb_bahan_mentah.code_item like'%BSJ%' order by code_item ASC";
$result_data = $db->selectAll($query_get_bsj);
$test_result = mysqli_fetch_assoc($result_data);

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <a href="<?= BASE_URL ?>../../bahan_setengah_jadi.php"> Semi Good Materials</a>
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
      <h2 class="mb-4">Semi Good Materials</h2>
      <button class="btn btn-primary mb-3" id="buat-menu">Buat Bahan</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">Number</th>
            <th scope="col" class="text-center">Code</th>
            <th scope="col" class="text-center">Item</th>
            <th scope="col" class="text-center">Unit</th>
            <th scope="col" class="text-center">Type Of Inventory</th>
            <th scope="col" class="text-center">Reference Cost Unit</th>
            <th scope="col" class="text-center">Average Cost Unit</th>
            <th scope="col" class="text-center">Lastbuy Cost Unit</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($result_data as $data) : ?>
            <tr style="cursor: pointer">
              <td onclick="redirect(this)" scope="row" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $no; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['code_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center" onclick="redirect(this)"><?= $data['item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center" onclick="redirect(this)"><?= $data['unit']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['tipe_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center" onclick="redirect(this)"><?= $rp->format($data['reference_unit']); ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $rp->format($data['average_cost_unit']); ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $rp->format($data['lastbuy_unit']); ?></td>
              <td class="text-center" align="center"><button onclick="deleteAll(this)" data-id="<?= $data['code_item']; ?>" style="background-color: transparent; border:none;"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
          <?php $no++;
          endforeach; ?>
        </tbody>
      </table>
    </div>
    <div id="pagination-container"></div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>../../../js/main.js"></script>
  <script src="function.js"></script>
</body>

</html>