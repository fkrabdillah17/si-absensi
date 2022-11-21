@extends('layouts.main')

@section('title')
    Edit Data Jurusan
@endsection

@section('content')
    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Jurusan</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('jurusan') input-error @enderror input-bordered input w-full max-w-2xl" id="jurusan"
                name="jurusan" value="{{ old('jurusan') ? old('jurusan') : $jurusan->jurusan }}" required />
            <input type="hidden" name="oldJurusan" value="{{ $jurusan->jurusan }}">
            @error('jurusan')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Kode Jurusan</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('kode_jurusan') input-error @enderror input-bordered input w-full max-w-2xl"
                name="kode_jurusan" id="kode_jurusan" value="{{ old('kode_jurusan') ? old('kode_jurusan') : $jurusan->kode_jurusan }}" required />
            <input type="hidden" name="oldKodejurusan" value="{{ $jurusan->kode_jurusan }}">
            @error('kode_jurusan')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('jurusan.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
