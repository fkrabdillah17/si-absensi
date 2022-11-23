@extends('layouts.main')

@section('title')
    Edit Data Siswa
@endsection

@section('content')
    <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Nama</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('nama') input-error @enderror input-bordered input w-full max-w-2xl" id="nama"
                name="nama" value="{{ old('nama') ? old('nama') : $siswa->nama }}" required />
            @error('nama')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">NISN</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('nisn') input-error @enderror input-bordered input w-full max-w-2xl" name="nisn"
                id="nisn" value="{{ old('nisn') ? old('nisn') : $siswa->nisn }}" required />
            <input type="hidden" name="oldNisn" value="{{ $siswa->nisn }}">
            @error('nisn')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Jenis Kelamin</span>
            </label>
            <select class="select-bordered select" name="jk" id="jk">
                <option value="{{ $siswa->jk }}" selected>{{ $siswa->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</option>
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
                <option value="{{ $siswa->agama }}" selected>{{ $siswa->agama }}</option>
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
                <span class="label-text">Kelas & Jurusan</span>
            </label>
            <select class="select-bordered select" name="kelas" id="kelas">
                <option value="{{ $siswa->kelas }}" selected>
                    {{ $siswa->getKelas->kelas . ' ' . $siswa->getKelas->kode_kelas . ' ' . $siswa->getKelas->getJurusan->jurusan }}</option>
                @foreach ($kelas as $item)
                    @if ($item->id != $siswa->getKelas->id)
                        <option value="{{ $item->id }}">{{ $item->kelas . ' ' . $item->kode_kelas . ' ' . $item->getJurusan->jurusan }}</option>
                    @endif
                @endforeach
            </select>
            @error('kelas')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">No. HP</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('no_hp') input-error @enderror input-bordered input w-full max-w-2xl" name="no_hp"
                id="no_hp" value="{{ old('no_hp') ? old('no_hp') : $siswa->no_hp }}" required />
            @error('no_hp')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Alamat</span>
            </label>
            <textarea class="@error('alamat') textarea-error @enderror textarea-bordered textarea h-40 rounded-lg" placeholder=" Type Here" id="alamat" name="alamat"
                required>{{ old('alamat') ? old('alamat') : $siswa->alamat }}</textarea>
            @error('alamat')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Username</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('username') input-error @enderror input-bordered input w-full max-w-2xl" id="username"
                name="username" value="{{ old('username') ? old('username') : $siswa->getAkun->username }}" />
            <input type="hidden" name="oldUsername" value="{{ $siswa->getAkun->username }}">
            @error('username')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Nama Orang Tua</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('nama_ortu') input-error @enderror input-bordered input w-full max-w-2xl" id="nama_ortu"
                name="nama_ortu" value="{{ old('nama_ortu') ? old('nama_ortu') : $siswa->getOrtu->nama }}" required />
            @error('nama_ortu')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">No. HP</span>
            </label>
            <input type="number" placeholder="Type here" class="@error('no_hp_ortu') input-error @enderror input-bordered input w-full max-w-2xl"
                name="no_hp_ortu" id="no_hp_ortu" value="{{ old('no_hp_ortu') ? old('no_hp_ortu') : $siswa->getOrtu->no_hp }}" required />
            @error('no_hp_ortu')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Alamat</span>
            </label>
            <textarea class="@error('alamat_ortu') textarea-error @enderror textarea-bordered textarea h-40 rounded-lg" placeholder=" Type Here" id="alamat_ortu"
                name="alamat_ortu" required>{{ old('alamat_ortu') ? old('alamat_ortu') : $siswa->getOrtu->alamat }}</textarea>
            @error('alamat_ortu')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Username Orang Tua</span>
            </label>
            <input type="text" placeholder="Type here" class="@error('username_ortu') input-error @enderror input-bordered input w-full max-w-2xl"
                id="username_ortu" name="username_ortu" value="{{ old('username_ortu') ? old('username_ortu') : $siswa->getOrtu->getAkun->username }}" />
            <input type="hidden" name="oldUsernameortu" value="{{ $siswa->getOrtu->getAkun->username }}">
            @error('username_ortu')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-between">
                <a type="button" href="{{ route('siswa.index') }}" class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
