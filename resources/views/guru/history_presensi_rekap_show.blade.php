@extends('layouts.main')

@section('title')
    Riwayat Presensi | Rekap Presensi | {{ $data[0]->getMapel->mapel }} |
    {{ $data[0]->getKelas->kelas . ' ' . $data[0]->getKelas->kode_kelas . ' ' . $data[0]->getKelas->getJurusan->kode_jurusan }}
@endsection

@section('content')
    <div class="mb-6 flex w-full min-w-0 flex-col break-words rounded-xl bg-white shadow-lg">
        <div class="overflow-x-auto">
            <table class="table-compact table w-full">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="{{ $pertemuan }}" class="text-center">Pertemuan Ke-</th>
                        <th colspan="4" class="text-center">Jumlah</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= $pertemuan; $i++)
                            <th>{{ $i }}</th>
                        @endfor
                        <th>Izin</th>
                        <th>Sakit</th>
                        <th>Alpa</th>
                        <th>Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nama = '';
                        $no = 1;
                    @endphp
                    @foreach ($data as $sw)
                        @if ($sw->getSiswa->nama != $nama)
                            @php
                                $izin = 0;
                                $sakit = 0;
                                $alpa = 0;
                                $hadir = 0;
                            @endphp
                            <tr class="hover">
                                <td>{{ $no }}</td>
                                <td>{{ $sw->getSiswa->nama }}</td>
                                @foreach ($data as $item)
                                    @if ($sw->getSiswa->nama == $item->getSiswa->nama)
                                        <td>
                                            @php
                                                if ($item->keterangan == 4) {
                                                    echo 'Hadir';
                                                    $hadir++;
                                                } elseif ($item->keterangan == 3) {
                                                    echo 'Alpa';
                                                    $alpa++;
                                                } elseif ($item->keterangan == 2) {
                                                    echo 'Sakit';
                                                    $sakit++;
                                                } elseif ($item->keterangan == 1) {
                                                    echo 'Izin';
                                                    $izin++;
                                                }
                                            @endphp
                                        </td>
                                    @endif
                                @endforeach
                                <td>{{ $izin }}</td>
                                <td>{{ $sakit }}</td>
                                <td>{{ $alpa }}</td>
                                <td>{{ $hadir }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endif
                        @php
                            $nama = $sw->getSiswa->nama;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4 flex flex-row justify-around">
            <a type="button" href="{{ route('history.presensi.pertemuan', [$mapel, $kelas]) }}"
                class="btn-ghost btn-sm btn capitalize hover:bg-transparent">Kembali</a>
        </div>
    </div>
@endsection
