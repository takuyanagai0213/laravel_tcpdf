$(function() {
  $('#pdf').on('click',function(){

    $.getJSON("/createPDFdata",function(json){
      console.log(json)
      var csrf = $('#_token').val(); 
      $.ajax({
        type:"POST",
        url:"createPDF",
        data:json,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      })
    })
    setTimeout(function(){
      $('#pdf').attr('type', 'submit');
      $('#form').submit();
      $('#pdf').attr('type', 'button');
    },1000);
})
})