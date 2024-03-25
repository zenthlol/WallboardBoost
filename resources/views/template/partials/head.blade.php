<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>

    {{-- Connect to Bootstrap --}}
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">


    {{-- Import Font Locally --}}
    <style>
        @font-face{
            font-family: "Poppins";
            src: url("fonts/Poppins/Poppins-Regular.ttf");
            font-weight: normal;
        }

        @font-face{
            font-family: "Poppins";
            src: url("fonts/Poppins/Poppins-Bold.ttf");
            font-weight: bold;
        }
    </style>

    {{-- responsive website according to screen --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    {{-- Connect to JS --}}
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/chart.js"></script>




    @yield('head')
</head>

