@extends('layouts.main')

@section('title')
    Presensi | {{ $data[0]->getMapel->mapel }} |
    {{ $data[0]->getKelas->kelas . ' ' . $data[0]->getKelas->kode_kelas . ' ' . $data[0]->getKelas->getJurusan->kode_jurusan }}
@endsection

@section('content')
    <div class="mb-6 flex w-full min-w-0 flex-col break-words rounded-xl bg-white shadow-lg">
        <form action="{{ route('history.presensi.update', [$data[0]->mapel, $data[0]->kelas, $data[0]->pertemuan]) }}" method="post">
            @csrf
            <div class="mb-0 rounded-t border-0 px-4 py-3">
                <div class="flex flex-row items-center">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{ $data[0]->tgl_presensi }}</td>
                                </tr>
                                <tr>
                                    <td>Pertemuan Ke-</td>
                                    <td>:</td>
                                    <td>
                                        {{ $data[0]->pertemuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tema</td>
                                    <td>:</td>
                                    <td> <input type="text" placeholder="Type here" class="@error('tema') input-error @enderror input-bordered input w-80"
                                            id="tema" name="tema" value="{{ old('tema') ? old('tema') : $data[0]->tema }}" required />
                                        @error('tema')
                                            <label class="label">
                                                <span class="label-text-alt">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>
                                        <textarea class="@error('pembahasan') textarea-error @enderror textarea-bordered textarea h-32 w-80 rounded-lg" placeholder=" Type Here" id="pembahasan"
                                            name="pembahasan" required>{{ old('pembahasan') ? old('pembahasan') : $data[0]->pembahasan }}</textarea>
                                        @error('pembahasan')
                                            <label class="label">
                                                <span class="label-text-alt">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-compact table w-full">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $iteration = 1;
                        @endphp
                        @foreach ($data as $sw)
                            <input type="hidden" name="siswa[{{ $loop->iteration }}]" value="{{ $sw->getSiswa->id }}">
                            <input type="hidden" name="iteration" value="{{ $iteration++ }}">
                            <tr class="hover">
                                <td>{{ $sw->getSiswa->nisn }}</td>
                                <td>{{ $sw->getSiswa->nama }}</td>
                                <td>{{ $sw->getSiswa->jk }}</td>
                                <td class="flex flex-row justify-around">
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text mr-2">Izin</span>
                                            <input type="radio" name="keterangan[{{ $loop->iteration }}]" class="radio checked:bg-red-500" value="1"
                                                {{ $sw->keterangan == 1 ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text mr-2">Sakit</span>
                                            <input type="radio" name="keterangan[{{ $loop->iteration }}]" class="radio checked:bg-red-500" value="2"
                                                {{ $sw->keterangan == 2 ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text mr-2">Alpha</span>
                                            <input type="radio" name="keterangan[{{ $loop->iteration }}]" class="radio checked:bg-red-500" value="3"
                                                {{ $sw->keterangan == 3 ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text mr-2">Hadir</span>
                                            <input type="radio" name="keterangan[{{ $loop->iteration }}]" class="radio checked:bg-red-500" value="4"
                                                {{ $sw->keterangan == 4 ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Keterangan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="my-4 flex flex-row justify-around">
                <a type="button" href="{{ route('history.presensi.pertemuan', [$data[0]->mapel, $data[0]->kelas]) }}"
                    class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
                <button type="submit" class="btn-primary btn-sm btn capitalize">Simpan</button>
            </div>
        </form>
    </div>
@endsection
