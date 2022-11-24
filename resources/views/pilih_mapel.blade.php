@extends('layouts.main')

@section('title')
    Pilih Mata Pelajaran
@endsection

@section('content')
    <a type="button" href="{{ route('dashboard') }}" class="btn-primary btn-sm btn my-2 max-w-[128px] capitalize">Kembali</a>
    <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($data as $item)
            <a href="{{ route('report', [$siswa, $item->id_mapel]) }}">
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
    </div>
@endsection
