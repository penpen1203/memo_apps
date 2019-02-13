$(function() {
  $(".js-form-content").on("keyup", function() {
    const count = $(this).val().length;
    console.log(count);
    $(".js-form-count-view").text(count);
  });
});
