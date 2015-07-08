// do a set interval check for Salvattore load
var j = setInterval (
function() {
  if(window.ready === true) {
    clearInterval(j);
    $("#columns").css("visibility", "visible");
  }
  // else continue
}, 100);
$(document).ready(function() {
  $(".link-button").on("click", function(e) {
    window.location.href = $(e.target).attr("data-link");
  });
  $(".edit-button").on("click", function(e) {
    window.location.href = $(e.target).attr("data-link");
  });
  $(".text-block").find("a").attr("target", "_blank");
});