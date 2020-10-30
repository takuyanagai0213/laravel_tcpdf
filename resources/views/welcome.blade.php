<!DOCTYPE html>
    <html lang="jp">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>
    <div id="app">
        <example-component></example-component>
    </div>
    <!-- <form action="/profile" method="POST">
        <input type="sumbit" >
    </form> -->
    <!-- <script src="{{ mix('/js/app.js')  }}"></script> -->
    <script src="{{ ('/js/test.js')  }}"></script>
    <script src="{{ ('/js/test2.js')  }}"></script>
    </body>
</html>
