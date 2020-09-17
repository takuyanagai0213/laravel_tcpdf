<!DOCTYPE html>
<html lang="ja">
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/download.js"></script>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>
<input type="hidden" id="_token" name="_token" value="{$csrf_token}" />


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