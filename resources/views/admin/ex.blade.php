<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="http://127.0.0.1:5173/@vite/client"></script>
    <link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/app.css" />
    <title> SI - PRESENSI | Jurusan
    </title>
    <link rel="shortcut icon" href="http://si-absensi.test/assets/img/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/kt-2.8.0/r-2.4.0/sc-2.0.7/datatables.css" />
</head>

<body class="flex flex-col min-h-screen" style="background-color: #dbdffd; color:#242f9b">
    <div class="navbar bg-base-100 text-gray-300 hover:text-white" style="background-color: #646FD4">
        <div class="flex-1">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 w-60 rounded-lg" style="background-color: #646FD4">
                    <li><a href="http://si-absensi.test/dashboard">Dashboard</a></li>
                    <li tabindex="0">
                        <a class="justify-between">
                            Data Master
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </a>
                        <ul class="bg-base-100 ml-3" style="background-color: #646FD4">
                            <li><a href="http://si-absensi.test/jurusan">Jurusan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="/dashboard">
                <img class=" h-12 w-auto" src="http://si-absensi.test/assets/img/logo.png" alt="Workflow" />
            </a>
            <a href="/dashboard">
                <span>Sistem Informasi Presensi</span>
            </a>
        </div>
        <div class="flex-none hidden lg:flex">
            <ul class="menu menu-horizontal p-0 ">
                <li><a href="http://si-absensi.test/dashboard">Dashboard</a></li>
                <li tabindex="0">
                    <a>
                        Data Master
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100 rounded-b-lg" style="background-color: #646FD4">
                        <li><a href="http://si-absensi.test/jurusan">Jurusan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <header class="shadow" style="background-color:#9BA3EB">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-slate-200">Dashboard</h1>
        </div>
    </header>

    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="h-max overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full display responsive nowrap" id="data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>company</th>
                                    <th>location</th>
                                    <th>Last Login</th>
                                    <th>Favorite Color</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Cy Ganderton</td>
                                    <td>Quality Control Specialist</td>
                                    <td>Littel, Schaden and Vandervort</td>
                                    <td>Canada</td>
                                    <td>12/16/2020</td>
                                    <td>Blue</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>company</th>
                                    <th>location</th>
                                    <th>Last Login</th>
                                    <th>Favorite Color</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer footer-center p-10 bg-primary text-primary-content">
        <div>
            <img class="mx-auto w-16" src="http://si-absensi.test/assets/img/logo.png" alt="SMKN 2 Bengkulu Tengah">
            <p class="font-bold uppercase">
                SMKN 2 Bengkulu Tengah
            </p>
            <p>Copyright © 2022 - All right reserved</p>
        </div>
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/kt-2.8.0/r-2.4.0/sc-2.0.7/datatables.js"></script>
    <script src="http://si-absensi.test/assets/js/scripts.js"></script>
</body>

</html>
