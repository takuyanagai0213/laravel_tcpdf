<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
  .title25 { width: 25%; }
  .title50 { width: 50%; }
  .left {  text-align: left; }
  .center {  text-align: center; }
  .right {  text-align: right; }
  .color_white { background-color: #fff; }
  .color_blue  { background-color: #99f; }
  .font_s { font-size: 8; }
  .font_m { font-size: 12; }
</style>
</head>
<!-- <body class="color_white"><table border="1" width="100%" cellpadding="10" cellspacing="10"> -->
<div class="wrapper">
<table class="tbl" border="1">
<tr><th class="num">No.</th>
  @foreach ($datas['equipments'] as $item)
  <th>{{ $item }}</th>
  @endforeach
</tr>

@foreach ($datas['date'] as $key => $item)
  <!-- <tr><td>{{ $key }}</td></tr> -->
  <tr><td>{{ $item }}</td></tr>
@endforeach
</table>
</div>
</body>
</html>