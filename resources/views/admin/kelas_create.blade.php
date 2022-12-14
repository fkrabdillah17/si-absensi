@extends('layouts.main')

@section('title')
    Tambah Data Kelas
@endsection

@section('content')
    <form action="{{ route('kelas.store') }}" method="post">
        @csrf
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Kelas</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('kelas') input-error @enderror input-bordered input w-full max-w-2xl" id="kelas"
                name="kelas" value="{{ old('kelas') }}" required />
            @error('kelas')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Kode Kelas</span>
            </label>
            <input type="text" placeholder="Type here (Optional)" class="@error('kode_kelas') input-error @enderror input-bordered input w-full max-w-2xl"
                name="kode_kelas" id="kode_kelas" value="{{ old('kode_kelas') }}" />
            @error('kode_kelas')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Jurusan</span>
            </label>
            <select class="select-bordered select" name="jurusan" id="jurusan">
                <option disabled selected>Pilih Jurusan</option>
                @foreach ($jurusan as $item)
                    <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                @endforeach
            </select>
            @error('jurusan')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('kelas.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
