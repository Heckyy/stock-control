function getItem() {
  var item = document.getElementById("item").value;
  alert(item);
  var data = {
    nama_item: item,
  };

  //   alert(item);

  // $.ajax({
  //   type: "POST",
  //   url: "http://localhost/stock/api/getunit.php",
  //   data: data,
  //   success: function (response) {
  //     document.getElementById("unit").value = response;
  //   },
  // });
}
