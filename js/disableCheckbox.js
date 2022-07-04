$(function() {
    console.log("Checkbox function works")
  $('input[type=checkbox]').change(function() {
      console.log("checkbox func reacts")
    if (!this.checked) {
      $(this).closest('div').find('input[type=number]').prop('disabled', true);
    } else {
      $(this).closest('div').find('input[type=number]').prop('disabled', false);
    }
  });
});