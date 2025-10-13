<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MARKETING VISUALISATION</title>
    <style>
        body { font-family: "DejaVu Sans", sans-serif; }
        #notes {
            position: fixed;
            left: 0;
            bottom: -10px;
            width: 100%;
            max-height: 250px;
            text-align: center;
            font-size: 9pt;
        }
        p {
            font-size: 10pt;
            word-break: break-all;
            margin-left: 30px;
            margin-right: 30px;
            text-align: left;
            margin-bottom: 50px !important;
        }
        .images-container {
            margin-top: 10px;
            padding-top: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 2%;
        }

        .shirt {
            z-index: 3;
            width: auto; /* Let width adjust automatically */
            max-width: 45%; /* Maximum width constraint */
            height: auto;
            max-height: 400px; /* Set your desired max height */
            object-fit: contain;
            margin-top: -10px;
        }

        .soloShirt {
            z-index: 999 !important;
            margin-top: -10px;
            width: auto !important;
            max-width: 70% !important;
            max-height: 600px !important;
            object-fit: contain;
            padding-left: 15% !important;
            height: auto;
        }
        .bg {
            position: absolute;
            background-image: url("../test.png");
            width: 100%;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body, html {
            height: 100%;
            margin: auto;
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
        <div style="margin-top: 260px !important; margin-left: 5% !important;">
            <div class="images-container">
            @if (@getimagesize($src))
                <img class="{{ $flag ? 'soloShirt' : 'shirt' }}" src="{{$src}}">
            @endif
            @if (@getimagesize($src1))
                <img class="{{ $flag ? 'soloShirt' : 'shirt' }}" src="{{$src1}}">
            @endif
            @if (@getimagesize($src2))
                <img class="{{ $flag ? 'soloShirt' : 'shirt' }}" src="{{$src2}}">
            @endif
            @if (@getimagesize($src3))
                <img class="{{ $flag ? 'soloShirt' : 'shirt' }}" src="{{$src3}}">
            @endif
            </div>

            @if($textPdf)
                <div id="notes">
                    @php
                        $textPdfCut= str_replace('"', "",$textPdf);
                    @endphp
                    <p>{{$textPdfCut}}</p>
                </div>
            @endif
        </div>
</body>

