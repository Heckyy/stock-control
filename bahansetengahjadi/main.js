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
  var code_bsj = document.getElementById("number").value;
  var nama_item = document.getElementById("name_item").value;
  var nama_item_fix = capitalizeWords(nama_item);
  var qty = document.getElementById("qty").value;
  var code_item = document.getElementById("item").value;
  var data = {
    code_bsj: code_bsj,
    nama_item: nama_item_fix,
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
