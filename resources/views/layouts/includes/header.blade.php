<div class="navbar z-50 bg-base-100 text-gray-300 hover:text-white" style="background-color: #646FD4">
    <div class="navbar-start w-full">
        <div class="dropdown">
            <label tabindex="0" class="btn-ghost btn lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="dropdown-content menu menu-compact mt-3 w-60 rounded-lg bg-base-100 p-2 shadow" style="background-color: #646FD4">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @if (Auth::user()->role == 0)
                    <li tabindex="0">
                        <a class="justify-between">
                            Data Master (Mobile)
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </a>
                        <ul class="ml-3" style="background-color: #646FD4">
                            <li class="capitalize"><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                            <li class="capitalize"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                            <li class="capitalize"><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
                            <li class="capitalize"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                            <li class="capitalize"><a href="{{ route('guru.index') }}">Guru</a></li>
                            <li class="capitalize"><a href="{{ route('jadwal.index') }}">jadwal</a></li>
                        </ul>
                    </li>
                @endif
                <li><a href="{{ route('logout') }}">Keluar</a></li>
            </ul>
        </div>
        <a href="/dashboard">
            <img class="h-12 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Workflow" />
        </a>
        <a href="/dashboard">
            <span>Sistem Informasi Presensi</span>
        </a>
    </div>
    <div class="hidden flex-none lg:flex">
        <ul class="menu menu-horizontal p-0">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (Auth::user()->role == 0)
                <li tabindex="0">
                    <a>
                        Data Master
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="rounded-b-lg p-2" style="background-color: #646FD4">
                        <li class="capitalize"><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                        <li class="capitalize"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                        <li class="capitalize"><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
                        <li class="capitalize"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                        <li class="capitalize"><a href="{{ route('guru.index') }}">Guru</a></li>
                        <li class="capitalize"><a href="{{ route('jadwal.index') }}">jadwal</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 1)
                <li><a href="{{ route('presensi.index') }}">Presensi</a></li>
                <li><a href="{{ route('history.presensi.index') }}">Riwayat</a></li>
            @endif
            <li><a href="{{ route('password.edit') }}">Ubah Password</a></li>
            <li><a href="{{ route('logout') }}">Keluar</a></li>
        </ul>
    </div>
</div>

<header class="shadow" style="background-color:#9BA3EB">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-slate-200">@yield('title')</h1>
    </div>
</header>
