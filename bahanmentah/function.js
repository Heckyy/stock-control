$(document).ready(function () {
  $("#upload").submit(function (e) {
    // const file = $("#file_excel").prop("files")[0];
    const file = $("#file_excel").prop("files")[0];
    // alert(file);
    var data = new FormData();
    data.append("file_excel", file);
    // alert(data.get("file_excel"));
    // data.append("file", file);

    $.ajax({
      type: "post",
      url: "http://localhost/stock/bahanmentah/proses_tambah_data.php",
      data: data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (response) {
        alert(response);
      },
      error: function (response) {
        alert(response);
      },
    });
  });
});
