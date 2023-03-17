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
        window.location.href =
          "http://localhost/stock/bahanjadi/editbahanjadi.php?data=" + response;
      },
    });
  });
});

function directBahan() {
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

var btnSave = document.getElementById("save-menu");
btnSave.addEventListener("click", function () {
  var code_bsj = document.getElementById("number").value;
  var reference_cost = document.getElementById("reference_cost").innerHTML;
  var average_cost = document.getElementById("average_cost").innerHTML;
  var lastbuy_cost = document.getElementById("lastbuy_cost").innerHTML;
  reference_cost = removeTag(reference_cost);
  reference_cost = removeRp(reference_cost);
  average_cost = removeTag(average_cost);
  average_cost = removeRp(average_cost);
  lastbuy_cost = removeTag(lastbuy_cost);
  lastbuy_cost = removeRp(lastbuy_cost);
  var data = {
    // tanggal: date,
    reference_cost: reference_cost,
    average_cost: average_cost,
    lastbuy_cost: lastbuy_cost,
    code_item: code_bsj,
  };
  $.ajax({
    type: "POST",
    url: "http://localhost/stock/api/insertcogsbj.php",
    data: data,
    success: function (response) {
      alert(response);
      window.location.href = "http://localhost/stock/bahanjadi/bahan_jadi.php";
    },
  });
});

function removeTag(string) {
  // Menghapus tag HTML
  var withoutHTML = string.replace(/(<([^>]+)>)/gi, "");
  return withoutHTML;
}
function removeRp(str) {
  // Menghapus "Rp"
  str = str.replace("Rp", "");

  // Menghapus "."
  str = str.replace(/\./g, "");

  return str;
}

function direct(e) {
  var code_bj = e.getAttribute("data-id");
  window.location.href =
    "http://localhost/stock/bahanjadi/editbahanjadi.php?data=" + code_bj;
}

function deleteBahan(e) {
  var code_bahan = e.getAttribute("data-id");
  var code_item = document.getElementById("number").value;
  window.location.href =
    "http://localhost/stock/api/deletebahanmentah.php?code_item=" +
    code_item +
    "& code_bahan=" +
    code_bahan;
}

function deleteMenu(e) {
  var code_item = e.getAttribute("data-id");
  // alert(code_item);
  window.location.href = "../api/deletemenuall.php?data=" + code_item;
}
