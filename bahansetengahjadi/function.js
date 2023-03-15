var btn = document.getElementById("buat-menu");
btn.addEventListener("click", function () {
  window.location.href =
    "http://localhost/stock/bahansetengahjadi/buat_bahan_setengah_jadi.php";
});

function redirect(e) {
  var code_bsj = e.getAttribute("data-id");
  window.location.href =
    "http://localhost/stock/bahansetengahjadi/editbahansetengahjadi.php?data=" +
    code_bsj;
}

function deleteAll(e) {
  var code_item = e.getAttribute("data-id");
  window.location.href =
    "http://localhost/stock/api/deletemenuall.php?data=" + code_item;
}
