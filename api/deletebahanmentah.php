<?php
require_once "../function/database.php";
$code_bahan = $_GET['code_bahan'];
$code_item = $_GET['code_item'];
// echo $code_bahan;
// die();

$patternBj = "#BJ#";

// ! Query For Delete Ingredients
$db = new Database();
$query_delete = "DELETE from tb_bahan_sj where code_bahan ='" . $code_bahan . "' && code_item='" . $code_item . "'";
$result  = $db->delete($query_delete);
if ($result) {
    if (preg_match($patternBj, $code_item)) {
        echo "<script>
    alert('Anda Berhasil Menghapus Data!');
    document.location.href = '../bahanjadi/editbahanjadi.php?data={$code_item}';
    </script>";
    } else {
        echo "<script>
    alert('Anda Berhasil Menghapus Data!');
    document.location.href = '../bahansetengahjadi/editbahansetengahjadi.php?data={$code_item}';
    </script>";
    }
} else {
    if (preg_match($patternBj, $code_item)) {
        echo "
        <script>
        alert('Anda Gagal Menghapus Data!')
        document.location.href = '../bahanjadi/editbahanjadi.php?data={$code_item}'
        </script>";
    } else {
        echo "
        <script>
        alert('Anda Gagal Menghapus Data!')
        document.location.href = '../bahansetengahjadi/editbahansetengahjadi.php?data={$code_item}'
        </script>";
    }
}
// if ($result) {

// } else {
//     
// }
