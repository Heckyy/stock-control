<?php
require_once "../function/database.php";
$code_bahan = $_GET['code_bahan'];
$code_item = $_GET['code_item'];
// echo $code_bahan;
// die();
// ! Query For Delete Ingredients
$db = new Database();
$query_delete = "DELETE from tb_bahan_sj where code_bahan ='" . $code_bahan . "'";
$result  = $db->delete($query_delete);
if ($result) {
    echo "<script>
    alert('Anda Berhasil Menghapus Data!');
    document.location.href = '../bahansetengahjadi/editbahansetengahjadi.php?data={$code_item}';
    </script>";
} else {
    echo "<script>alert('Anda Gagal Menghapus Data!')</script>";
}
