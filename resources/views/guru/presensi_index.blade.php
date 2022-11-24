@extends('layouts.main')

@section('title')
    Presensi | Daftar Mata Pelajaran
@endsection

@section('content')
    <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($mapel as $item)
            <a href="{{ route('presensi.kelas', $item->id_mapel) }}">
                <div class="shadow-xs flex items-center overflow-hidden rounded-lg bg-white p-4">
                    <div class="mr-4 rounded-full bg-cyan-100 p-3 text-cyan-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">
                            {{ $item->getMapel->mapel }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
        {{-- <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-lime-100 p-3 text-lime-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Kelas
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $kelas }}
                </p>
            </div>
        </div> --}}
    </div>
@endsection
