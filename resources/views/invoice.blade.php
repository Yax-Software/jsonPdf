<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>VISUALISATION</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap');
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
            margin: 0;
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
</div>
</body>
