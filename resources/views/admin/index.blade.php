@extends('layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-cyan-100 p-3 text-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Guru
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
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
                    Jurusan
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-teal-100 p-3 text-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Kelas
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-violet-100 p-3 text-violet-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Mata Pelajaran
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-fuchsia-100 p-3 text-fuchsia-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Orang Tua
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
        <div class="shadow-xs flex items-center rounded-lg bg-white p-4">
            <div class="mr-4 rounded-full bg-pink-100 p-3 text-pink-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    Siswa
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    12
                </p>
            </div>
        </div>
    </div>
@endsection
