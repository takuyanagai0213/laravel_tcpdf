<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
table.border td {
  border: 1px solid #000000;
}
td.padding-row {
  line-height: 50%;
  text-align: center;
</style>
</head>
<!-- <body class="color_white"><table border="1" width="100%" cellpadding="10" cellspacing="10"> -->
<div class="">
<table class="tbl" border="1">
<tr><th class="num">日付\機器名称</th>
  @foreach ($datas['equipments'] as $equipment)
  <th>{{ $equipment }}</th>
  <th></th>
  @endforeach
</tr>
<tr><th class="num"></th>
  @foreach ($datas['temp'] as $equipment_id => $temp_all)
    @foreach ($temp_all as $temp_type => $temp)
      <th>{{ $temp_type }}</th>
    @endforeach
  @endforeach
</tr>

@foreach ($datas['date'] as$date)
    <tr>
      <td class="padding-row">{{ $date }}</td>
  @foreach ($datas['temp'] as $equipment_id => $temp_all)
    @foreach ($temp_all as $temp_type => $temp)
      @foreach ($temp as $temp_data)
        <td class="padding-row"">{{ $temp_data }}</td>
      @endforeach
    @endforeach
  @endforeach
    </tr>
@endforeach
</table>
</div>
</body>
</html>