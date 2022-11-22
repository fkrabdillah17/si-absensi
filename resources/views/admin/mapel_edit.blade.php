@extends('layouts.main')

@section('title')
    Edit Mata Pelajaran
@endsection

@section('content')
    <form action="{{ route('mapel.update', $mapel->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Mata Pelajaran</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('mapel') input-error @enderror input-bordered input w-full max-w-2xl" id="mapel"
                name="mapel" value="{{ old('mapel') ? old('mapel') : $mapel->mapel }}" required />
            <input type="hidden" name="oldMapel" value="{{ $mapel->mapel }}">

            @error('mapel')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Kode</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('kode_mapel') input-error @enderror input-bordered input w-full max-w-2xl" name="kode_mapel"
                id="kode_mapel" value="{{ old('kode_mapel') ? old('kode_mapel') : $mapel->kode_mapel }}" required />
            <input type="hidden" name="oldKodemapel" value="{{ $mapel->kode_mapel }}">
            @error('kode_mapel')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">SKS</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('sks') input-error @enderror input-bordered input w-full max-w-2xl" name="sks"
                id="sks" value="{{ old('sks') ? old('sks') : $mapel->sks }}" required />
            @error('sks')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('mapel.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
