$(function() {
  $.getJSON('DocumentController/downloadPdf',function(data){
    console.log(data)
    var html = "";
    $.each( data, function( key, value){
      // $('#test').append('<tr></tr>')
      html += '<tr><td><input type=text value='+ key +'></td></tr>';
      console.log(key)
    })
    $('#test').append(html)
  })
})