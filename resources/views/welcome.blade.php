<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
                html, body {
                    background-color: #fff;
                    background-image: url(http://pepc.pertamina.com/Content/images/slider/slide5/pepc_5.jpg);
                    color: black;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 100vh;
                    margin: 0;
                }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                        <a class="btn btn-danger" href="{{ route('signin') }}">Signin</a>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    User Management System
                </div>
            </div>
        </div>
    </body>
</html>
