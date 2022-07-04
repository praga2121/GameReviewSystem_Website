$('.compare-checkbox').on('click', function(){
    if($(this).prop("checked") == true){
        $(this).closest('tr').addClass('selected-row');
        //alert("IT WORKS");
    }else if($(this).prop("checked") == false){
        $(this).closest('tr').removeClass('selected-row');
        //alert("IT STOPS");
    }
  }
);
