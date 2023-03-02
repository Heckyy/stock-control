$(document).ready(function () {
  function getData() {
    $.ajax({
      type: "POST",
      url: "http://localhost/stock/cogs/getcogs.php",
      success: function (response) {
        var data = JSON.parse(response);
        var no = 1;
        var html = "";
        $.each(data, function (key, value) {
          html += "<tr>";
          html += "<td class='text-center'>" + no + "</td>";
          html += "<td class='text-center'>" + value["code_item"] + "</td>";
          html += "<td class='text-center'>" + value["name_item"] + "</td>";
          html += "<td class='text-center'>" + value["tipe_item"] + "</td>";
          html +=
            "<td class='text-center'>" + value["reference_cost"] + "</td>";
          html += "<td class='text-center'>" + value["avg_cost"] + "</td>";
          html += "<td class='text-center'>" + value["last_buy_cost"] + "</td>";

          html += "</tr>";
          no++;
        });
        $("#data-table").html(html);
      },
    });
  }

  getData();
});
