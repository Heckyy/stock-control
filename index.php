<?php
require_once("baseUrl.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventory</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
                    <a href="bahanmentah.php"> Raw Materials</a>
                </li>
                <li>
                    <a href="bahansetengahjadi/bahan_setengah_jadi.php"> Semi Good Materials</a>
                </li>
                <li>
                    <a href="bahanjadi/bahan_jadi.php"> Finished Good Materials</a>
                </li>
                <li>
                    <a href="index.php"> COGS</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Costing</h2>
            <div class="mb-4" style="display: flex;">
                <h6 class="me-4">Type Of Inventory : </h6>
                <select onchange="changeType()" name="type_inventory" id="type_inventory">
                    <option value="all">All</option>
                    <option value="Raw">Raw Material</option>
                    <option value="Semi">Semi Good Materials</option>
                    <option value="Finished">Finished Good Material </option>
                </select>
            </div>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Code</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Type Of Inventory</th>
                        <th scope="col" class="text-center">Reference Cost</th>
                        <th scope="col" class="text-center">Average Cost</th>
                        <th scope="col" class="text-center">Last Buy Cost</th>
                    </tr>
                </thead>
                <tbody id="data-table">

                </tbody>

            </table>
        </div>
        <div id="pagination-container"></div>
    </div>


    <script src="js/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="cogs/main.js"></script>
    <script src="js/main.js"></script>

</body>

</html>