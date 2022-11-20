<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SI - Absensi</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body style="background-color: #dbdffd; color:#242f9b">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="avatar">
                    <div class="w-24 rounded">
                        <img src="{{ asset('assets/img/logo.png') }}" />
                    </div>
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Sistem Informasi Presensi
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    <a class="font-medium text-indigo-600 hover:text-indigo-500">
                        Silahkan masukkan username dan password
                    </a>
                </p>
            </div>
            <div class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label htmlFor="username" class="sr-only">
                            Username
                        </label>
                        <input name="username" type="text" autoComplete="username" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Username" />
                    </div>
                    <div>
                        <label htmlFor="password" class="sr-only">
                            Password
                        </label>
                        <input name="password" type="password" autoComplete="password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password" />
                    </div>
                    <div>
                        <label class="sr-only">
                            Masuk sebagai
                        </label>
                        <select class="select select-bordered rounded-none rounded-b-md shadow-none focus:outline-none w-full">
                            <option disabled selected>Masuk Sebagai</option>
                            <option>Admin</option>
                            <option>Gutu</option>
                            <option>Siswa</option>
                            <option>Orang Tua</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="button"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fillRule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clipRule="evenodd" />
                            </svg>
                        </span>
                        Masuk
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
