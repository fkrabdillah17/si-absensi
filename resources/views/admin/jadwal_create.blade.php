@extends('layouts.main')

@section('title')
    Tambah Data Jadwal
@endsection

@section('content')
    <form action="{{ route('jadwal.store') }}" method="post">
        @csrf
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Mata Pelajaran</span>
            </label>
            <select class="select-bordered select" name="mapel" id="mapel">
                <option disabled selected>--Pilihan--</option>
                @foreach ($mapel as $mp)
                    <option value="{{ $mp->id }}">{{ $mp->mapel }}</option>
                @endforeach
            </select>
            @error('mapel')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Kelas</span>
            </label>
            <select class="select-bordered select" name="kelas" id="kelas">
                <option disabled selected>--Pilihan--</option>
                @foreach ($kelas as $kl)
                    <option value="{{ $kl->id }}">{{ $kl->kelas . ' ' . $kl->kode_kelas . ' ' . $kl->getJurusan->jurusan }}</option>
                @endforeach
            </select>
            @error('kelas')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Guru Pengampu</span>
            </label>
            <select class="select-bordered select" name="guru" id="guru">
                <option disabled selected>--Pilihan--</option>
                @foreach ($guru as $gr)
                    <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                @endforeach
            </select>
            @error('guru')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Jumlah Pertemuan</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('jumlah_pertemuan') input-error @enderror input-bordered input w-full max-w-2xl"
                name="jumlah_pertemuan" id="jumlah_pertemuan" value="{{ old('jumlah_pertemuan') }}" required />
            @error('jumlah_pertemuan')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('jadwal.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
