@extends('layouts.main')

@section('title')
    Rekap Presensi | {{ $data[0]->getMapel->mapel }}
@endsection

{{-- @section('content')
    <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @if (Auth::user()->role == 3)
            <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
                <div class="mr-4 rounded-full bg-orange-100 p-3 text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Izin
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $izin }}
                    </p>
                </div>
            </div>
            <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
                <div class="mr-4 rounded-full bg-cyan-100 p-3 text-cyan-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Sakit
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $sakit }}
                    </p>
                </div>
            </div>
            <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
                <div class="mr-4 rounded-full bg-red-100 p-3 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Alpha
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $alpha }}
                    </p>
                </div>
            </div>
            <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
                <div class="mr-4 rounded-full bg-green-100 p-3 text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Hadir
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $hadir }}
                    </p>
                </div>
            </div>
        @endif
        @if (Auth::user()->role == 2)
            @foreach ($siswa as $item)
                <a href="{{ route('report', $item->id) }}">
                    <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
                        <div class="mr-4 rounded-full bg-cyan-100 p-3 text-cyan-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600">
                                Siswa
                            </p>
                            <p class="text-lg font-semibold text-gray-700">
                                {{ $item->nama }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>

    @if (Auth::user()->role == 3)
        <div class="overflow-x-auto">
            <table class="table-compact table w-full">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Presensi</th>
                        <th>Mata Pelajaran</th>
                        <th>Pertemuan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $sw)
                        <tr class="hover">
                            <td>{{ $sw->getSiswa->nisn }}</td>
                            <td>{{ $sw->getSiswa->nama }}</td>
                            <td>{{ $sw->tgl_presensi }}</td>
                            <td>{{ $sw->getMapel->mapel }}</td>
                            <td>{{ $sw->pertemuan }}</td>
                            <td>
                                @if ($sw->keterangan == 1)
                                    Izin
                                @else
                                    @if ($sw->keterangan == 2)
                                        Sakit
                                    @else
                                        @if ($sw->keterangan == 3)
                                            Alpha
                                        @else
                                            Hadir
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Presensi</th>
                        <th>Mata Pelajaran</th>
                        <th>Pertemuan</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif
@endsection --}}

@section('content')
    @if (Auth::user()->role == 2)
        <a type="button" href="{{ route('pilih.mapel', $data[0]->siswa) }}" class="btn-primary btn-sm btn my-2 max-w-[128px] capitalize">Kembali</a>
    @endif
    @if (Auth::user()->role == 3)
        <a type="button" href="{{ route('dashboard') }}" class="btn-primary btn-sm btn my-2 max-w-[128px] capitalize">Kembali</a>
    @endif
    <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-orange-100 p-3 text-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Izin
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $izin }}
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-cyan-100 p-3 text-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Sakit
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $sakit }}
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-red-100 p-3 text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Alpha
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $alpha }}
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-green-100 p-3 text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Hadir
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $hadir }}
                </p>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table-compact table w-full">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Presensi</th>
                    <th>Mata Pelajaran</th>
                    <th>Pertemuan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr class="hover">
                        <td>{{ $dt->getSiswa->nisn }}</td>
                        <td>{{ $dt->getSiswa->nama }}</td>
                        <td>{{ $dt->tgl_presensi }}</td>
                        <td>{{ $dt->getMapel->mapel }}</td>
                        <td>{{ $dt->pertemuan }}</td>
                        <td>
                            @if ($dt->keterangan == 1)
                                Izin
                            @else
                                @if ($dt->keterangan == 2)
                                    Sakit
                                @else
                                    @if ($dt->keterangan == 3)
                                        Alpha
                                    @else
                                        Hadir
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Presensi</th>
                    <th>Mata Pelajaran</th>
                    <th>Pertemuan</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
        </table>
    </div>
    @foreach ($data as $item)
    @endforeach
@endsection
