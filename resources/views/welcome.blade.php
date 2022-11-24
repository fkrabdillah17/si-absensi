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
    <div class="flex min-h-screen items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
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
            <form action="{{ route('store.login') }}" method="post">
                @csrf
                @if ($errors->any())
                    <p class="mt-2 text-center text-sm text-gray-600">
                        <a class="font-medium text-red-600 hover:text-red-500">
                            Username atau password anda salah!
                        </a>
                    </p>
                @endif
                <div class="mt-8 space-y-6">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div>
                            <label htmlFor="username" class="sr-only">
                                Username
                            </label>
                            <input name="username" type="text" autoComplete="username" required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Username" />
                        </div>
                        <div>
                            <label htmlFor="password" class="sr-only">
                                Password
                            </label>
                            <input name="password" type="password" autoComplete="password" required
                                class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password" />
                        </div>
                        {{-- <div>
                            <label class="sr-only">
                                Masuk sebagai
                            </label>
                            <select class="select-bordered select w-full rounded-none rounded-b-md shadow-none focus:outline-none">
                                <option disabled selected>Masuk Sebagai</option>
                                <option>Admin</option>
                                <option>Guru</option>
                                <option>Siswa</option>
                                <option>Orang Tua</option>
                            </select>
                        </div> --}}
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
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
            </form>
        </div>
    </div>
</body>

</html>
