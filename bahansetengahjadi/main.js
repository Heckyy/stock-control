function getItem() {
  var item = document.getElementById("item").value;
  // alert(item);
  var data = {
    nama_item: item,
  };

  //   alert(item);

  $.ajax({
    type: "POST",
    url: "http://localhost/stock/api/getunit.php",
    data: data,
    success: function (response) {
      document.getElementById("unit").value = response;
    },
  });
}

// var btnSave = document.getElementById("save");
// btnSave.addEventListener("click", function () {
//   alert("SUKSES");
// });

var new_item = document.getElementById("new");
new_item.addEventListener("submit", function () {
  var output = document.getElementById("output").value;
  var output_unit = document.getElementById("output_unit").value;
  var code_bsj = document.getElementById("number").value;
  var nama_item = document.getElementById("name_item").value;
  var nama_item_fix = capitalizeWords(nama_item);
  var qty = document.getElementById("qty").value;
  var code_item = document.getElementById("item").value;
  var data = {
    code_bsj: code_bsj,
    nama_item: nama_item_fix,
    output: output,
    output_unit: output_unit,
    qty: qty,
    code_item: code_item,
  };
  if (code_item == "null") {
    alert("Silakan Pilih Item!");
  } else {
    $.ajax({
      type: "POST",
      url: "http://localhost/stock/api/bahansetengahjadi.php",
      data: data,

      success: function (response) {
        // alert(response);
        window.location.href =
          "http://localhost/stock/bahansetengahjadi/editbahansetengahjadi.php?data=" +
          response;
      },
    });
  }
});

function capitalizeWords(str) {
  // ! This function to change each first string to be Upper CASE!
  // Pecah string menjadi array kata-kata
  let words = str.split(" ");

  // Ubah setiap kata menjadi uppercase
  let capitalizedWords = words.map(function (word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  });

  // Gabungkan kembali array menjadi string
  return capitalizedWords.join(" ");
}

var btnSave = document.getElementById("save-menu");
btnSave.addEventListener("click", function () {
  var code_bsj = document.getElementById("number").value;
  var reference_cost = document.getElementById("reference_cost").innerHTML;
  var average_cost = document.getElementById("average_cost").innerHTML;
  var lastbuy_cost = document.getElementById("lastbuy_cost").innerHTML;
  reference_cost = removeTag(reference_cost);
  reference_cost = removeRp(reference_cost);
  average_cost = removeTag(reference_cost);
  average_cost = removeRp(reference_cost);
  lastbuy_cost = removeTag(reference_cost);
  lastbuy_cost = removeRp(reference_cost);

  var data = {
    reference_cost: reference_cost,
    average_cost: average_cost,
    lastbuy_cost: lastbuy_cost,
    code_item: code_bsj,
  };

  $.ajax({
    type: "POST",
    url: "http://localhost/stock/api/insertbahansj.php",
    data: data,
    success: function (response) {
      alert(response);
      window.location.href =
        "http://localhost/stock/bahansetengahjadi/bahan_setengah_jadi.php";
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
