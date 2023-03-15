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
            html +=
              "<td onclick='cetak(this)' data-id='`${value[0]}`' class='text-center'>" +
              no +
              "</td>";
            html += "<td class='text-center'>" + value[0] + "</td>";
            html += "<td class='text-center'>" + value[1] + "</td>";
            html += "<td class='text-center'>" + value[2] + "</td>";
            html += "<td class='text-center'>" + value[3] + "</td>";
            html += "<td class='text-center'>" + value[4] + "</td>";
            html += "<td class='text-center'>" + value[5] + "</td>";
            html += "<td class='text-center'>" + value[6] + "</td>";

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
  var periode3 = localStorage.getItem("periode");
  $("#last-cogs").html(periode3);

  $("#update-cogs").click(function (e) {
    const date = new Date();
    const date_month = date.getMonth() + 1;
    const date_year = date.getFullYear();
    var periode = date_month + "/" + date_year;
    var data = {
      periode: periode,
    };
    // alert(periode);
    $.ajax({
      type: "POST",
      url: "http://localhost/stock/api/updatecogs.php",
      data: data,

      success: function (response) {
        alert(response);
        const date2 = new Date();
        const date_month2 = date.getMonth() + 1;
        const date_year2 = date.getFullYear();
        const date_day = date.getDate();
        const hour = date.getHours();
        const minutes = date.getMinutes();
        const time = hour + ":" + minutes;
        var periode2 =
          date_day + "/" + date_month2 + "/" + date_year2 + " " + time;
        localStorage.setItem("periode", periode2);
        $("#last-cogs").html(periode2);
      },
    });
  });
  function download() {
    window.location.href = "template-raw-materlas.xlsx";
  }

  $("#new").submit(function () {
    var code_item = document.getElementById("number").value;
    var item_name = document.getElementById("name_item").value;
    var reference_cost = document.getElementById("reference_cost").value;
    var reference_cost_unit = document.getElementById(
      "reference_cost_unit"
    ).value;
    alert(item_name);
    alert(reference_cost);
    alert(reference_cost_unit);
  });
});
