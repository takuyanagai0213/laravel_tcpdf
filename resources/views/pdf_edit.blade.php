<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/pdf.js"></script>
<title></title>
</head>
<body>
<h1>PDFダウンロード</h1>
 
<table id=test border="1"></table>
<form action="{{ url('/pdf')}}" method="POST">
    {{ csrf_field() }}
    <!-- <div><textarea rows="6" name="message"></textarea></div> -->
    <div><input type="submit" name="pdf" value="PDFダウンロード"></div>
    <div><input type="submit" name="csv" value="CSVダウンロード"></div>
</form>
 
</body>
</html>