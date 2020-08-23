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
<tr><th class="num">日付\機器名称</th>
  @foreach ($datas['equipments'] as $equipment)
  <th>{{ $equipment }}</th>
  @endforeach
</tr>
<tr><th class="num"></th>
  @foreach ($datas['temp_type'] as $temp_type)
  <th>{{ $temp_type }}</th>
  @endforeach
</tr>

@foreach ($datas['date'] as$date)
    <tr>
      <td style="padding: 0px">{{ $date }}</td>
  @foreach ($datas['temp'] as $temp_all)
    @foreach ($temp_all as $key => $temp)
      <td style="padding: 0px">{{ $temp }}</td>
    @endforeach
  @endforeach
    </tr>
@endforeach
</table>
</div>
</body>
</html>