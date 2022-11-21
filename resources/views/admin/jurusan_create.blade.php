@extends('layouts.main')

@section('title')
    Tambah Data Jurusan
@endsection

@section('content')
    <form action="{{ route('jurusan.store') }}" method="post">
        @csrf
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Jurusan</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('jurusan') input-error @enderror input-bordered input w-full max-w-2xl" id="jurusan"
                name="jurusan" value="{{ old('jurusan') }}" required />
            @error('jurusan')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Kode Jurusan</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('kode_jurusan') input-error @enderror input-bordered input w-full max-w-2xl"
                name="kode_jurusan" id="kode_jurusan" value="{{ old('kode_jurusan') }}" required />
            @error('kode_jurusan')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('jurusan.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
