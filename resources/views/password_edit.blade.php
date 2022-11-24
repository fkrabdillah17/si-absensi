@extends('layouts.main')

@section('title')
    Ubah password
@endsection

@section('content')
    <form action="{{ route('password.update', Auth::user()->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-control mx-auto w-full max-w-2xl">
            <label class="label">
                <span class="label-text">Password lama</span>
            </label>
            <input type="password" placeholder="Type here" class="@error('old_password') input-error @enderror input-bordered input w-full max-w-2xl" id="old_password"
                name="old_password" value="{{ old('old_password') }}" required />
            @error('old_password')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Password baru</span>
            </label>
            <input type="password" placeholder="Type here" class="@error('password') input-error @enderror input-bordered input w-full max-w-2xl" name="password"
                id="password" value="{{ old('password') }}" required />
            @error('password')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <label class="label">
                <span class="label-text">Konfirmasi password baru</span>
            </label>
            <input type="password" placeholder="Type here" class="@error('password_confirmation') input-error @enderror input-bordered input w-full max-w-2xl"
                name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required />
            @error('password_confirmation')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
            <div class="my-4 flex flex-row justify-center">
                <button type="submit" class="btn-primary btn-wide btn capitalize">Simpan</button>
            </div>
        </div>
    </form>
@endsection
