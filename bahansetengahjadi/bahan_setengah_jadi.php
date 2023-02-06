<?php
require_once('../baseUrl.php');


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
        <li class="active">
          <a href="<?= BASE_URL ?>../../../index.php"> Bahan Mentah</a>
        </li>
        <li>
          <a href="<?= BASE_URL ?>../../bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
        </li>
        <li>
          <a href="<?= BASE_URL ?>../../../bahanjadi/bahan_jadi.php"> Bahan Jadi</a>
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
            <th scope="col">Number</th>
            <th scope="col">Code</th>
            <th scope="col">Item</th>
            <th scope="col">Category</th>
            <th scope="col">Ingredient</th>
            <th scope="col">Cost</th>
          </tr>
        </thead>
        <tbody>
          <tr onclick="cetak()" style="cursor: pointer">
            <th scope="row">1</th>
            <td>BSJ001</td>
            <td>Nasi Putih</td>
            <td>27-10-2022</td>
            <td>2</td>
            <td>Rp.2.500</td>
          </tr>
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