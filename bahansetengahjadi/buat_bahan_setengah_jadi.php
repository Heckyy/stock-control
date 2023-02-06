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
                            <input type="text" name="number" id="number" class="form-control square" required="required" disabled="disabled">
                        </div>
                        <div class="col-sm-2 col-lg-2" align="right">
                            Tanggal
                        </div>
                        <!-- <div class="col-sm-2 col-lg-2">
								<input type="date" name="tanggal" id="tanggal"  class="form-control square">
							</div> -->
                        <div class="col-sm-2 col-lg-2">
                            <input type="date" name="tanggal" id="tanggal" class="form-control square" required="required">
                        </div>
                    </div>
                    <div class="space_line row mt-3">
                        <div class="col-sm-2 col-lg-2">
                            Nama Item
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" style="border:thin solid black" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                            </div>

                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Relocation
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <select id="cluster" name="cluster" class="form-control square bg-white">
                                <option value="">Select</option>
                                <?php
                                foreach ($cluster as $key => $tr) {
                                ?>

                                    <option value="<?php echo $tr['id_cluster']; ?>">
                                        <?php echo $tr['code_cluster'] . ' - ' . $tr['cluster']; ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Division
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <select id="divisi" name="divisi" class="form-control square bg-white">
                                <option value="">Select</option>
                                <?php
                                foreach ($position as $key => $p) {
                                ?>

                                    <option value="<?php echo $p['id_position']; ?>">
                                        <?php echo $p['position']; ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Request By
                        </div>
                        <div class="col-sm-2 col-lg-3">
                            <select id="employee" name="employee" class="form-control square bg-white">
                                <option value="">Select</option>
                                <?php
                                foreach ($employee as $key => $p) {
                                ?>

                                    <option value="<?php echo $p['id_employee']; ?>">
                                        <?php echo $p['name']; ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Note
                        </div>
                        <div class="col-sm-5 col-lg-5">
                            <textarea name="note" id="note" class="form-control square textarea-edit"></textarea>
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Item <a href="#" data-bs-toggle="modal" data-bs-target="#tambah_barang"><i class="bi bi-plus-circle"></i></a>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <select id="item" name="item" class="choices form-select square bg-white" required="required">
                                <option value="">Select</option>
                                <?php
                                foreach ($item as $key => $i) {
                                ?>
                                    <option value="<?php echo $i['id_item']; ?>">
                                        <?php echo $i['item']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1 col-lg-1" align="right">
                            Qty
                        </div>
                        <div class="col-sm-1 col-lg-1">
                            <input type="number" name="qty" id="qty" min="1" class="form-control square" required="required">
                        </div>
                        <div class="col-sm-1 col-lg-1" align="right">
                            Unit
                        </div>
                        <div class="col-sm-1 col-lg-1">
                            <input type="text" name="unit" id="unit" value="Pcs" class="form-control square" required="required">
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-sm-2 col-lg-2">
                            Request Information
                        </div>
                        <div class="col-sm-5 col-lg-5">
                            <textarea name="keterangan" id="keterangan" class="form-control square textarea-edit"></textarea>
                        </div>
                    </div>
                    <div class="space_line row">
                        <div class="col-lg-12">
                            <button type="submit" id="btn" class="btn btn-sm btn-success btn-custom">Save</button>
                        </div>
                    </div>
                </form>

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td width="50px" align="center">No</td>
                            <td width="250px">Item</td>
                            <td width="200px">Price</td>
                            <td>Total</td>
                            <td width="200px">Total</td>
                            <td width="150px" align="center">Aksi</td>
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
</body>

</html>