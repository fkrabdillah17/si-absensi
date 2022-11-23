@extends('layouts.main')

@section('title')
    Ubah Data Jadwal
@endsection

@section('content')
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Mata Pelajaran</span>
            </label>
            <select class="select-bordered select" name="mapel" id="mapel">
                <option value="{{ $jadwal->id_mapel }}" selected>{{ $jadwal->getMapel->mapel }}</option>
                @foreach ($mapel as $mp)
                    @if ($mp->id != $jadwal->id_mapel)
                        <option value="{{ $mp->id }}">{{ $mp->mapel }}</option>
                    @endif
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
                <option value="{{ $jadwal->id_kelas }}" selected>
                    {{ $jadwal->getKelas->kelas . ' ' . $jadwal->getKelas->kode_kelas . ' ' . $jadwal->getKelas->getJurusan->jurusan }}</option>
                @foreach ($kelas as $kl)
                    @if ($kl->id != $jadwal->id_kelas)
                        <option value="{{ $kl->id }}">{{ $kl->kelas . ' ' . $kl->kode_kelas . ' ' . $kl->getJurusan->jurusan }}
                        </option>
                    @endif
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
                <option value="{{ $jadwal->id_guru }}" selected>{{ $jadwal->getGuru->nama }}</option>
                @foreach ($guru as $gr)
                    @if ($gr->id != $jadwal->id_guru)
                        <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                    @endif
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
                name="jumlah_pertemuan" id="jumlah_pertemuan" value="{{ old('jumlah_pertemuan') ? old('jumlah_pertemuan') : $jadwal->jumlah_pertemuan }}"
                required />
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
