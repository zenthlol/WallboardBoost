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



    {{-- Connect to JS --}}
    <script src="assets/js/script.js"></script>

    @yield('head')
</head>
