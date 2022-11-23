@extends('layouts.main')

@section('title')
    Jurusan
@endsection

@section('content')
    <div class="mb-6 flex w-full min-w-0 flex-col break-words rounded-xl bg-white shadow-lg">
        <div class="mb-0 rounded-t border-0 px-4 py-3">
            <div class="flex flex-row items-center">
                <a type="button" href="{{ route('jurusan.create') }}" class="btn-primary btn-sm btn">Tambah</a>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <table class="responsive nowrap display table-compact table w-full" id="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th data-priority="1">Jurusan</th>
                        <th>Kode</th>
                        <th data-priority="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $jurusan)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $jurusan->jurusan }}</td>
                            <th class="uppercase">{{ $jurusan->kode_jurusan }}</th>
                            <th class="flex flex-row justify-around">
                                {{-- <a href="">
                                <div class="tooltip tooltip-left" data-tip="Detail Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </a> --}}
                                <a class="btn-ghost btn" href="{{ route('jurusan.edit', $jurusan->id) }}">
                                    <div class="tooltip tooltip-left" data-tip="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 fill-orange-500">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                    </div>
                                </a>
                                {{-- <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="post" onsubmit="{!! Alert::warning('Warning Title', 'Warning Message') !!}">
                                    <button type="submit">Delete</button>
                                </form> --}}
                                {{-- <a href="{{ route('jurusan.destroy', $jurusan->id) }}">
                                    <div class="tooltip tooltip-left" data-tip="Hapus Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 fill-red-500">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a> --}}
                                <label for="my-modal-{{ $jurusan->id }}" class="btn-ghost btn">
                                    <div class="tooltip tooltip-left" data-tip="Hapus Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 fill-red-500">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </label>

                            </th>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Jurusan</th>
                        <th>Kode</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @foreach ($data as $modal)
        <input type="checkbox" id="my-modal-{{ $modal->id }}" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <label for="my-modal-{{ $modal->id }}" class="btn-sm btn-circle btn absolute right-2 top-2">✕</label>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>

                <h3 class="text-center text-lg font-bold">Apakah anda yakin akan menghapus jurusan {{ $modal->jurusan }}?</h3>
                <div class="my-4 flex flex-row justify-around">
                    <label for="my-modal-{{ $modal->id }}" class="btn-warning btn capitalize">Tidak</label>
                    <form action="{{ route('jurusan.destroy', $modal->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-primary btn capitalize">Hapus</button>
                    </form>
                    {{-- <button type="submit" class="btn-primary btn capitalize">Hapus</button> --}}
                </div>
            </div>
        </div>
    @endforeach
@endsection
