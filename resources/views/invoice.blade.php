<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>VISUALISATION</title>
    <style>
        #notes {
            position: fixed;
            bottom: 10px !important;
            font-family: Arial, Helvetica, sans-serif;
            text-align: left;
            margin:0px 5px 0px 5px !important;
        }
        #notes p {
           font-size: 13pt;
            word-break: break-all;
            width: 800px !important;
        }
        .shirt
        {
            z-index: 3;
            transform: scale(0.8);

        }
        .bg {
            background-image: url("../test.png");
            width: 100%;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body, html {
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;
        }

    </style>
    <script>
        window.axios = require('axios');

        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        const token = document.head.querySelector('meta[name="csrf-token"]');

        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }
    </script>
 </head>
<body>
    @csrf
<div class="bg" style="width: 100%;height: 100%;">
    @if (@getimagesize($src))
    <img class="shirt" src="{{$src}}" style="margin-top: 320px !important;margin-right: 80px !important;margin-left: 55px !important">
    @endif
    @if (@getimagesize($src1))
    <img class="shirt" src="{{$src1}}">
    @endif
    <br>
    @if (@getimagesize($src2))
    <img class="shirt" src="{{$src2}}" style="margin-right: 80px !important; margin-left: 55px !important">
    @endif
    @if (@getimagesize($src3))
    <img class="shirt" src="{{$src3}}">
    @endif
        @if($textPdf)
            <div id="notes">
                <p>{{$textPdf}}</p>
            </div>
        @endif
</div>
</body>

