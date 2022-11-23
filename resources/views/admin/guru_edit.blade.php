@extends('layouts.main')

@section('title')
    Edit Data Guru
@endsection

@section('content')
    <form action="{{ route('guru.update', $guru->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Nama</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('nama') input-error @enderror input-bordered input w-full max-w-2xl" id="nama"
                name="nama" value="{{ old('nama') ? old('nama') : $guru->nama }}" required />
            @error('nama')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">NIP</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('nip') input-error @enderror input-bordered input w-full max-w-2xl" name="nip"
                id="nip" value="{{ old('nip') ? old('nip') : $guru->nip }}" required />
            <input type="hidden" name="oldNip" value="{{ $guru->nip }}">
            @error('nip')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Jenis Kelamin</span>
            </label>
            <select class="select-bordered select" name="jk" id="jk">
                <option value="{{ $guru->jk }}" selected>{{ $guru->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jk')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Agama</span>
            </label>
            <select class="select-bordered select" name="agama" id="agama">
                <option value="{{ $guru->agama }}" selected>{{ $guru->agama }}</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen (Protestan)</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            @error('agama')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">No. HP</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('no_hp') input-error @enderror input-bordered input w-full max-w-2xl" name="no_hp"
                id="no_hp" value="{{ old('no_hp') ? old('no_hp') : $guru->no_hp }}" required />
            @error('no_hp')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Alamat</span>
            </label>
            <textarea class="@error('alamat') textarea-error @enderror textarea-bordered textarea h-40 rounded-lg" placeholder=" Type Here" id="alamat" name="alamat"
                required>{{ old('alamat') ? old('alamat') : $guru->alamat }}</textarea>
            @error('alamat')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Username</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('username') input-error @enderror input-bordered input w-full max-w-2xl" id="username"
                name="username" value="{{ old('username') ? old('username') : $guru->getAkun->username }}" required />
            <input type="hidden" name="oldUsername" value="{{ $guru->getAkun->username }}">
            @error('username')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('guru.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
