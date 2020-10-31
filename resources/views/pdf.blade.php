<!DOCTYPE html>
<html lang="ja">
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/download.js"></script>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>


</head>
<body>
<h1>PDFダウンロード</h1>
 
<form action="{{ url('/downloadPDF')}}" method="POST" id="form">
    {{ csrf_field() }}
    <div><input type="button" id="pdf" value="PDFダウンロード"></div>
    <!-- <input type="hidden" id="_token" name="_token" value="{$csrf_token}" /> -->
</form>
 
</body>
</html>