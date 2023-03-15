<?php
require_once("../baseUrl.php");
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
  <link rel="stylesheet" href="main.css" />

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
      <h1><a href="<?= BASE_URL ?>../../../index.php" class="logo">Inventory</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="">
          <a href="<?= BASE_URL ?>../purchasing/purchasing.php"> Purchasing</a>
        </li>
        <li class="">
          <a href="<?= BASE_URL ?>../../../bahanmentah.php"> Bahan Mentah</a>
        </li>
        <li>
          <a href="<?= BASE_URL ?>../../../bahansetengahjadi/bahan_setengah_jadi.php"> Bahan Setengah Jadi</a>
        </li>

        <li>
          <a href="bahan_jadi.php"> Bahan Jadi</a>
        </li>
        <li>
          <a href="<?= BASE_URL ?>../../../index.php"> COGS</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Bahan Jadi</h2>
      <div class="mb-3">
        <button onclick="direct()" class="btn btn-primary">Buat Menu</button>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Code</th>
            <th scope="col">Item</th>
            <th scope="col">Type Of Inventory</th>
            <th scope="col">Reference Cost</th>
            <th scope="col">Average Cost</th>
            <th scope="col">Lastbuy Cost</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="pagination-container"></div>
  </div>

  
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="<?= BASE_URL ?>../../../js/main.js"></script>
  <script src="main.js"></script>
</body>

</html>