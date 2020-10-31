$(function() {
  $('#pdf').on('click',function(){
    var data ={
      flag:"js"
    }
    $.getJSON("/createPDFdata",data,function(json){
      console.log(json)
      var data ={
        id: "3",
        date:"2020/09/07",
        time:"10:00",
        temp:"80"
      }
      if(json !== 'error'){
        function test(){
          return $.ajax({
            type:"POST",
            url:"createPDF",
            data:data,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          })
        }
        test().done(function(response){
          console.log(response)
          $('#pdf').attr('type', 'submit');
          $('#form').submit();
          $('#pdf').attr('type', 'button');
        }).fail(function(){
          console.log('fail')
        })
      }
    })
})
})