<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SI-Presensi | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/kt-2.8.0/r-2.4.0/sc-2.0.7/datatables.css" />
</head>

<body class="flex min-h-screen flex-col" style="background-color: #dbdffd; color:#242f9b">
    @include('layouts.includes.header')
    {{-- Start Content --}}
    <main class="flex-grow">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="h-max overflow-y-auto">
                <div class="container mx-auto grid px-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @include('layouts.includes.footer')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/kt-2.8.0/r-2.4.0/sc-2.0.7/datatables.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
