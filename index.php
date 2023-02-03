<?php
require_once("baseUrl.php");
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
      <h1><a href="index.php" class="logo">Inventory</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="index.php"> Bahan Mentah</a>
        </li>
        <li>
          <a href="bahansetengahjadi/bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
        </li>
        <li>
          <a href="bahanjadi/bahan_jadi.php"> Bahan Jadi</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Bahan Mentah</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Code</th>
            <th scope="col">Item</th>
            <th scope="col">Purchase Date</th>
            <th scope="col">Qty</th>
            <th scope="col">Unit</th>
            <th scope="col">Cost</th>
            <th scope="col">Cost / Unit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>BM001</td>
            <td>Beras</td>
            <td>27-10-2022</td>
            <td>5</td>
            <td>KG</td>
            <td>Rp.50.000</td>
            <td>Rp.10.000</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>BM002</td>
            <td>Air Mineral</td>
            <td>27-10-2022</td>
            <td>12</td>
            <td>L</td>
            <td>Rp.60.000</td>
            <td>Rp.5.000</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>BM003</td>
            <td>Garam</td>
            <td>28-10-2022</td>
            <td>5000</td>
            <td>Gr</td>
            <td>Rp.50000</td>
            <td>Rp.10</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="pagination-container"></div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>