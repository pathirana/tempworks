<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Temper.works - Test</title>

        <!--Basic Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
                width:80vw;
            }

            .flex-center {
                display:block;
                margin:0 auto;
                padding:10% 0px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

        </style>
    </head>
    <body>
    <div id='app'>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <statistics-component></statistics-component>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
