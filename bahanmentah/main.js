$(document).ready(function () {
  function getData() {
    $.ajax({
      type: "post",
      url: "http://localhost/stock/api/bahanmentah.php",
      data: "data",
      success: function (response) {
        // alert(response);
        var result = JSON.parse(response);
        // console.log(result);
        var html;
        var no = 1;
        if (result.length) {
          $.each(result, function (index, value) {
            html += "<tr>";
            html += "<td>" + no + "</td>";
            html += "<td>" + value[0] + "</td>";
            html += "<td>" + value[1] + "</td>";
            html += "<td>" + value[2] + "</td>";
            html += "<td>" + value[3] + "</td>";
            html += "<td>" + value[4] + "</td>";
            html += "<td>" + value[5] + "</td>";
            html += "<td>" + value[6] + "</td>";

            html += "</tr>";
            no++;
          });
        } else {
          html = "<tr><td>Data Not Found!</td></tr>";
        }

        $("#data-table").html(html);
        // alert(html);
      },
    });
  }

  getData();
});
