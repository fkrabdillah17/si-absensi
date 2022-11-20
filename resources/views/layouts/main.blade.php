<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SI - Absensi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body class="flex flex-col min-h-screen" style="background-color: #dbdffd; color:#242f9b">
    @include('layouts.includes.header')
    @yield('content')
    @include('layouts.includes.footer')
</body>

</html>
