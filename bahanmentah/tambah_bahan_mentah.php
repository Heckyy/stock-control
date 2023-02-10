<?php
require_once('../baseUrl.php');
require_once('../function/database.php');
$db = new Database();
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
            <div class="app-card-header p-3 main-content container-fluid">
                <div class="row justify-content-between align-items-center line">
                    <div class="col-auto">
                        <h4 class="app-card-title">
                            Tambah Bahan Mentah
                        </h4>
                    </div>
                </div>
            </div>
            <div class="app-card-body pb-3 main-content container-fluid">
                <form method="POST" id="upload" enctype="multipart/form-data">
                    <div class="space_line row">
                        <div class="col-sm-4 col-lg-4">
                            <table class="table">
                                <tr class="bg-white">
                                    <td colspan="2">Unggah (Excel . xlsx , CSV)</td>
                                </tr>
                                <tr class="bg-white">
                                    <td>
                                        <h6>Masukan File : </h6>
                                        <input type="file" name="file_excel" id="file_excel" class="form-control square bg-white" required="required">
                                    </td>
                                    <td class="">
                                        <button type="submit" id="btn" class="btn btn-success mt-4">
                                            Unggah
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <div class="col-lg-12" id="data_view"></div>
            </div>
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