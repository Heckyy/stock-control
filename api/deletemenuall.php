<?php
require_once "../function/database.php";
$code_item=$_GET['data'];
$hasil = 0;
$db = new Database();

// Delete From tb_bahan_mentah
$query_delet_tb_bm = "DELETE from tb_bahan_mentah where code_item='".$code_item."'";
if($db->delete($query_delet_tb_bm)){
$hasil +=1; 
}

// Delete From tb_cogs_bm!
$query_delet_tb_cogs = "DELETE from tb_cogs_bm where code_item='".$code_item."'";
if($db->delete($query_delet_tb_cogs)){
$hasil +=1; 
}
// Delete From tb_bahan_sj!
$query_delet_tb_bahan_sj = "DELETE from tb_bahan_sj where code_item='".$code_item."'";
if($db->delete($query_delet_tb_bahan_sj)){
$hasil +=1; 
}

if($hasil == 3){
    echo "<script>
    alert('Anda Berhasil Menghapus Data!');
    document.location.href = '../bahansetengahjadi/bahan_setengah_jadi.php';
    </script>";
}else{
    echo "<script>
    alert('Anda Gagal Menghapus Data!');
    document.location.href = '../bahansetengahjadi/bahan_setengah_jadi.php';
    </script>";
}