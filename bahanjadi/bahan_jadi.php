<?php
require_once("../baseUrl.php");
require_once("../function/database.php");
require_once("../function/rupiah.php");
$db = new Database();
$rp = new Rupiah();
//! Get data good materials!

$query_get_data = "SELECT DISTINCT tb_bahan_mentah.code_item as code_item,tb_bahan_mentah.item AS item,tb_bahan_mentah.tipe_item as tipe_item,tb_cogs_bm.reference_cost_unit as reference_unit, tb_cogs_bm.average_cost_unit AS average_cost_unit,tb_cogs_bm.last_buy_unit as lastbuy_unit,tb_bahan_mentah.unit as unit FROM `tb_bahan_mentah` INNER JOIN tb_cogs_bm ON tb_bahan_mentah.code_item = tb_cogs_bm.code_item WHERE tb_bahan_mentah.code_item like'%BJ%' order by code_item ASC";
$result_data = $db->selectAll($query_get_data);
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
      <h2 class="mb-4">Finished Good Materials</h2>
      <div class="mb-3">
        <button onclick="directBahan()" class="btn btn-primary">Buat Menu</button>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th class="text-center" scope="col">Number</th>
            <th scope="col" class="text-center">Code</th>
            <th scope="col" class="text-center">Item</th>
            <th scope="col" class="text-center">Type Of Inventory</th>
            <th scope="col" class="text-center">Reference Cost</th>
            <th scope="col" class="text-center">Average Cost</th>
            <th scope="col" class="text-center">Lastbuy Cost</th>
            <th scope="col" class="text-center">Action</th>
          </tr>


        </thead>
        <tbody>
          <?php $no = 1;
          if (mysqli_num_rows($result_data)) {
            foreach ($result_data as $data) :
          ?>
              <tr style="cursor: pointer;">
                <td data-id="<?= $data['code_item']; ?>" onclick="direct(this)" class="text-center"><?= $no; ?></td>
                <td data-id="<?= $data['code_item']; ?>" onclick="direct(this)" class="text-center"><?= $data['code_item']; ?></td>
                <td onclick="direct(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['item']; ?></td>
                <td onclick="direct(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $data['tipe_item']; ?></td>
                <td onclick="direct(this)" data-id="<?= $data['code_item']; ?>" class="text-center"><?= $rp->format($data['reference_unit']); ?></td>
                <td onclick="direct(this)" class="text-center" data-id="<?= $data['code_item']; ?>"><?= $rp->format($data['average_cost_unit']); ?></td>
                <td onclick="direct(this)" class="text-center" data-id="<?= $data['code_item']; ?>"><?= $rp->format($data['lastbuy_unit']); ?></td>
                <td onclick="deleteMenu(this)" data-id="<?= $data['code_item']; ?>" class="text-center" align="center"><button onclick="deleteAll(this)" data-id="<?= $data['code_item']; ?>" style="background-color: transparent; border:none;"><i class="fa-solid fa-trash"></i></button></td>
              </tr>

            <?php endforeach; ?>

          <?php } else { ?>
            <tr>
              <td>Data Not Found!</td>
            </tr>
          <?php }; ?>
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