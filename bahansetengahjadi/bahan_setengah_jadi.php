<?php
require_once('../baseUrl.php');
require_once "../function/database.php";
$db = new Database();
// ! Get Data BSJ!
$query_get_bsj = "SELECT distinct code_item,item,tipe_item,qty,unit,cost,cost_unit from tb_bahan_mentah where code_item like '%BSJ%' order by code_item ASC";
$result_data = $db->selectAll($query_get_bsj);
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
          <a href="<?= BASE_URL ?>../purchasing/purchasing.php"> Purchasing</a>
        </li>
        <li class="">
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
      <h2 class="mb-4">Bahan Setengah Jadi</h2>
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
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($result_data as $data) : ?>
            <tr style="cursor: pointer">
              <td onclick="redirect(this)" scope="row" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $no; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['code_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center" onclick="redirect(this)"><?= $data['item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['tipe_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center" onclick="redirect(this)"><?= $data['code_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['code_item']; ?></td>
              <td scope="row" onclick="redirect(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['code_item']; ?></td>
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