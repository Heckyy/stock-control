$(document).ready(function () {
  $("#new").submit(function () {
    var code_item = document.getElementById("number").value;
    var item = document.getElementById("name_item").value;
    var bahan = document.getElementById("item").value;
    var qty = document.getElementById("qty").value;
    var data = {
      code_item: code_item,
      item: item,
      bahan: bahan,
      qty: qty,
    };

    $.ajax({
      type: "POST",
      url: "http://localhost/stock/api/insertbj.php",
      data: data,
      success: function (response) {
        alert(response);
      },
    });
  });
});

function direct() {
  window.location.href = "http://localhost/stock/bahanjadi/buat_bahan_jadi.php";
}

function getItem() {
  var item = document.getElementById("item").value;
  var data = {
    nama_item: item,
  };

  $.ajax({
    type: "POST",
    url: "http://localhost/stock/api/getunit.php",
    data: data,
    success: function (response) {
      document.getElementById("unit").value = response;
    },
  });
}
