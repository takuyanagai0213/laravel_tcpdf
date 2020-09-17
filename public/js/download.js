$(function() {
  var csrf = $('#_token').val(); 
$.ajax({
  type:"POST",
  url:"downloadPdf",
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(pdfStruct){
   console.log(pdfStruct)
   console.log("ok")
  },
  error: function(){
   console.log("ng")
  }  

})
// $.getJSON('/DocumentController/downloadPdf',function() {
//   console.log("hello")
// })

console.log("hello")
})