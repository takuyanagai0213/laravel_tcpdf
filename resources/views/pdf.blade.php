<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<h1>PDFダウンロード</h1>
 
<form action="{{ url('/pdf')}}" method="POST">
    {{ csrf_field() }}
    <!-- <div><textarea rows="6" name="message"></textarea></div> -->
    <div><input type="submit" name="pdf" value="PDFダウンロード"></div>
    <div><input type="submit" name="csv" value="CSVダウンロード"></div>
</form>
 
</body>
</html>