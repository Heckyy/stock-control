$(document).ready(function () {
  getData();
});

function getData() {
  var type = document.getElementById("type_inventory").value;
  var data = {
    type: type,
  };

  // alert(type);

  $("#table").dataTable({
    paging: true,
    searching: false,
    selected: false,
    info: false,
    lengthChange: false,
    pageLength: 3,
    ajax: {
      type: "POST",
      url: "http://localhost/stock/api/getType.php",
      dataSrc: "",
      data: data,
    },
    columns: [
      { data: "code_item" },
      { data: "name_item" },
      { data: "tipe_item" },
      { data: "reference_cost" },
      { data: "avg_cost" },
      { data: "last_buy_cost" },
    ],
    destroy: true,
  });
}
function changeType() {
  getData();
}
// alert(type);
// $.ajax({
//   type: "POST",
//   url: "http://localhost/stock/cogs/getcogs.php",
//   success: function (response) {
//     var data = JSON.parse(response);
//     var no = 1;
//     var html = "";
//     $.each(data, function (key, value) {
//       html += "<tr>";
//       html += "<td class='text-center'>" + no + "</td>";
//       html += "<td class='text-center'>" + value["code_item"] + "</td>";
//       html += "<td class='text-center'>" + value["name_item"] + "</td>";
//       html += "<td class='text-center'>" + value["tipe_item"] + "</td>";
//       html +=
//         "<td class='text-center'>" + value["reference_cost"] + "</td>";
//       html += "<td class='text-center'>" + value["avg_cost"] + "</td>";
//       html += "<td class='text-center'>" + value["last_buy_cost"] + "</td>";
//       html += "</tr>";
//       no++;
//     });
//     $("#data-table").html(html);
//   },
// });
