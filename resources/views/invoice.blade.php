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

        table {
            border-collapse: collapse;
            margin-top: 30px;
            font-size: 10pt;
            margin-right: 15px !important;
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
                <td><h1 style="font-size: 30pt; margin-left: 15px !important; margin-right: 15px !important;">SIMULATION</h1></td>
              <td><p style="text-align: left;font-size: 6pt; overflow-wrap: break-word; margin-right: 15px !important;">Szanowny Kliencie, <br>
                      Prosimy o dokładne sprawdzenie załączonej makiety pod kątem błędów, takich jak treść projektu i umiejscowienie,
                      kolory, pisownia i tak dalej. Wszelkie rozbieżności powinny być wyraźnie zaznaczone.
                      Nasza firma nie odpowiada za błędy, które nie zostały zaznaczone na makiecie.
                  </p></td>
                <td><p style="text-align: left;font-size: 6pt; overflow-wrap: break-word; margin-right: 15px !important;">Dear Customer, <br>
                        Please check the attached mockup carefully for any errors such as design content and placement,
                        colours, spelling and so on. Any discrepancies should be clearly marked.
                        Our company is not responsible for mistakes that were not marked on the mockup.
                    </p></td>
            </tr>
         </table>
</div>
    <img src="{{$src}}" style="margin-left: 200px; margin-bottom: 100px; ">
    <h1>Available colors:</h1>
@foreach($colors as $c)
    <div style="border-radius: 1px;display: inline-block; height: 20px; width: 50px; margin-right: 40px;  margin-top: 50px; border: 1px solid black; background-color: {{$c[1]}}; ">
        <div style="text-align: left;font-size: 8pt; margin-top: 20px; margin-right: 10px;">{{$c[0]}}</div> </div>
@endforeach

</body>
</html>
