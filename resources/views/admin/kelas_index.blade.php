@extends('layouts.main')

@section('title')
    Kelas
@endsection

@section('content')
    <div class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-xl bg-white shadow-lg">
        <div class="mb-0 rounded-t border-0 px-4 py-3">
            <div class="flex flex-row items-center">
                <a type="button" href="{{ route('kelas.create') }}" class="btn-primary btn-sm btn">Tambah</a>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <table class="responsive nowrap display table-compact table w-full" id="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $kelas)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $kelas->kelas . $kelas->kode_kelas . ' ' . $kelas->getJurusan->kode_jurusan }}</td>
                            <th class="uppercase">{{ $kelas->getJurusan->jurusan }}</th>
                            <th class="flex flex-row justify-around">
                                <a class="btn-ghost btn" href="{{ route('kelas.edit', $kelas->id) }}">
                                    <div class="tooltip tooltip-left" data-tip="Edit Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 fill-orange-500">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                    </div>
                                </a>
                                <label for="my-modal-{{ $kelas->id }}" class="btn-ghost btn">
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
                        <th>Kelas</th>
                        <th>Jurusan</th>
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

                <h3 class="text-center text-lg font-bold">Apakah anda yakin akan menghapus kelas
                    {{ $modal->kelas . $modal->kode_kelas . ' ' . $modal->getJUrusan->jurusan }}?</h3>
                <div class="my-4 flex flex-row justify-around">
                    <label for="my-modal-{{ $modal->id }}" class="btn-warning btn capitalize">Tidak</label>
                    <form action="{{ route('kelas.destroy', $modal->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-primary btn capitalize">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
