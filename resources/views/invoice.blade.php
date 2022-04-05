<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
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
    <style>
        th {
            border: 1px black;
            border-style: solid none;
            text-align: center;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        td {
            text-align: center;

        }
        #top {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>
<body>
<div id="top">
    @csrf
    <div class="left" style="font-size: 8pt;">
        <table id="firstTable" style="border: 1px solid black; margin-bottom: 100px; ">';
          <tr>
                <td><h1 style="font-size: 30pt; margin-left: 15px !important; margin-right: 15px !important;">Visualisation</h1></td>
                <td><p style="text-align: left;font-size: 6pt; overflow-wrap: break-word; margin-right: 15px !important;">Dear Customer, <br>
                        Please check the attached mockup carefully for any errors such as design content and placement,
                        colours, spelling and so on. Any discrepancies should be clearly marked.
                        Our company is not responsible for mistakes that were not marked on the mockup.
                    </p></td>
              <td><p style="font-size: 6pt; overflow-wrap: break-word; margin-right: 15px !important; text-align: left;">Lieber Kunde, <br>
                      Bitte überprüfen Sie das beigefügte Mockup sorgfältig auf Fehler wie Designinhalt und Platzierung,
                      Farben, Rechtschreibung und so weiter. Etwaige Abweichungen sind deutlich zu kennzeichnen.
                      Unser Unternehmen ist nicht verantwortlich für Fehler, die nicht auf dem Mockup gekennzeichnet wurden.
                  </p></td>
            </tr>
         </table>
</div>
    @if (@getimagesize($src))
    <img src="{{$src}}" style="margin-right: 80px">
    @endif
    @if (@getimagesize($src1))
    <img src="{{$src1}}">
    @endif
    <br>
    @if (@getimagesize($src2))
    <img src="{{$src2}}" style="margin-right: 80px">
    @endif
    @if (@getimagesize($src3))
    <img src="{{$src3}}">
    @endif
</div>
</body>
</html>
