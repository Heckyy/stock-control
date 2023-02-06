(function ($) {
  "use strict";

  var fullHeight = function () {
    $(".js-fullheight").css("height", $(window).height());
    $(window).resize(function () {
      $(".js-fullheight").css("height", $(window).height());
    });
  };
  fullHeight();

  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
})(jQuery);

$("#btn-tambah").click(function (e) {
  window.location.href = "tambahitem/tambahItem.php";
});

function cetak() {
  $("#exampleModal").modal("show");
}
