<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ortu;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Presensi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function dashboard (){
        return view('admin.index');
    }
    public function jurusan_index (){
        $data = Jurusan::orderBy('jurusan','asc')->get();
        return view('admin.jurusan_index', compact('data'));
    }
    public function jurusan_create (){
        return view('admin.jurusan_create');
    }
    public function jurusan_store(Request $request) {
        $rules = [
            'jurusan' => 'required|unique:jurusans,jurusan',
            'kode_jurusan' => 'required|unique:jurusans,kode_jurusan',
        ];
        $message = [
            'jurusan.required' => 'Isi kolom jurusan!',
            'jurusan.unique' => 'Nama jurusan sudah ada!',
            'kode_jurusan.required' => 'Isi kode jurusan!',
            'kode_jurusan.unique' => 'Kode jurusan sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            Jurusan::create([
                'jurusan' => $request->jurusan,
                'kode_jurusan' => $request->kode_jurusan
            ]);
            return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan!');
        }
    }
    public function jurusan_edit(Jurusan $jurusan){
        return view('admin.jurusan_edit', compact('jurusan'));
    }
    public function jurusan_update(Request $request, Jurusan $jurusan){

        if($request->jurusan != $request->oldJurusan && $request->kode_jurusan != $request->oldKodejurusan ){
            $rules_jurusan = "required|unique:jurusans,jurusan";
            $rules_kodejurusan = "required|unique:jurusans,kode_jurusan";
        } elseif($request->jurusan == $request->oldJurusan && $request->kode_jurusan != $request->oldKodejurusan){
            $rules_jurusan = "required";
            $rules_kodejurusan = "required|unique:jurusans,kode_jurusan";
        } elseif ($request->jurusan != $request->oldJurusan && $request->kode_jurusan == $request->oldKodejurusan){
            $rules_jurusan = "required|unique:jurusans,jurusan";
            $rules_kodejurusan = "required";
        } else {
            $rules_jurusan = "required";
            $rules_kodejurusan = "required";
        }

        $rules = [
            'jurusan' => $rules_jurusan,
            'kode_jurusan' => $rules_kodejurusan,
        ];
        $message = [
            'jurusan.required' => 'Isi kolom jurusan!',
            'jurusan.unique' => 'Nama jurusan sudah ada!',
            'kode_jurusan.required' => 'Isi kode jurusan!',
            'kode_jurusan.unique' => 'Kode jurusan sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        if ($validate) {
            // Start Save Data
            $jurusan->update([
                'jurusan' => $request->jurusan,
                'kode_jurusan' => $request->kode_jurusan,
            ]);
            return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diubah!');
        }
    }
    public function jurusan_destroy(Jurusan $jurusan){
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus!');
    }
    public function kelas_index (){
        $data = Kelas::orderBy('kelas','asc')->get();
        return view('admin.kelas_index', compact('data'));
    }
    public function kelas_create (){
        $jurusan = Jurusan::orderBy('jurusan','asc')->get();
        return view('admin.kelas_create', compact('jurusan'));
    }
    public function kelas_store(Request $request) {
        $rules = [
            'jurusan' => 'required',
            'kelas' => 'required',
        ];
        $message = [
            'jurusan.required' => 'Pilih jurusan!',
            'kelas.required' => 'Isi kolom kelas!',
        ];
        $validate = $this->validate($request, $rules, $message);

        $data = Kelas::All();
        $count = 0;
        foreach($data as $check){
            if($request->kelas == $check->kelas && $request->kode_kelas == $check->kode_kelas && $request->jurusan == $check->id_jurusan){
                $count +=1;
            } 
        }
        if($count < 1){
            if ($validate) {
                Kelas::create([
                    'kelas' => $request->kelas,
                    'kode_kelas' => $request->kode_kelas,
                    'id_jurusan' => $request->jurusan,
                ]);
                return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
            }
        } else {
            return redirect()->route('kelas.create')->with('info','Data sudah ada!');
        }
    }
    public function kelas_edit(Kelas $kelas){
        $jurusan = Jurusan::orderBy('jurusan','asc')->get();
        return view('admin.kelas_edit', compact('kelas','jurusan'));
    }
    public function kelas_update(Request $request, Kelas $kelas){
        $rules = [
            'kelas' => 'required',
            'jurusan' => 'required',
        ];
        $message = [
            'kelas.required' => 'Isi kolom kelas!',
            'jurusan.required' => 'pilih jurusan!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi

        $data = Kelas::All();
        $count = 0;
        foreach($data as $check){
            if($request->kelas == $check->kelas && $request->kode_kelas == $check->kode_kelas && $request->jurusan == $check->id_jurusan){
                $count +=1;
            } 
        }
        if($count < 1){
            if ($validate) {
                $kelas->update([
                    'kelas' => $request->kelas,
                    'kode_kelas' => $request->kode_kelas,
                    'id_jurusan' => $request->jurusan
                ]);
                return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diubah!');
            }
        } else {
            return redirect()->route('kelas.edit', $kelas->id)->with('info','Data sudah ada atau data tidak berubah!');
        }
    }
    public function kelas_destroy(Kelas $kelas){
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }

    public function mapel_index(){
        $data = Mapel::orderBy('mapel','asc')->get();
        return view('admin.mapel_index', compact('data'));
    }
    public function mapel_create(){
        return view('admin.mapel_create');
    }
    public function mapel_store(Request $request){
        $rules = [
            'mapel' => 'required|unique:mapels,mapel',
            'kode_mapel' => 'required|unique:mapels,kode_mapel',
            'sks' => 'required',
        ];
        $message = [
            'sks.required' => 'Isi kolom sks!',
            'mapel.required' => 'Isi kolom mata pelajaran!',
            'mapel.unique' => 'Nama mata pelajaran sudah ada!',
            'kode_mapel.required' => 'Isi kode mata pelajaran!',
            'kode_mapel.unique' => 'Kode mata pelajaran sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            Mapel::create([
                'mapel' => $request->mapel,
                'kode_mapel' => $request->kode_mapel,
                'sks' => $request->sks,
            ]);
            return redirect()->route('mapel.index')->with('success', 'Data mata pelajaran berhasil ditambahkan!');
        }
    }
    public function mapel_edit(Mapel $mapel){
        return view('admin.mapel_edit', compact('mapel'));
    }
    public function mapel_update(Request $request, Mapel $mapel){
        if($request->mapel != $request->oldMapel && $request->kode_mapel != $request->oldKodemapel ){
            $rules_mapel = "required|unique:mapels,mapel";
            $rules_kodemapel = "required|unique:mapels,kode_mapel";
        } elseif($request->mapel == $request->oldMapel && $request->kode_mapel != $request->oldKodemapel){
            $rules_mapel = "required";
            $rules_kodemapel = "required|unique:mapels,kode_mapel";
        } elseif ($request->mapel != $request->oldMapel && $request->kode_mapel == $request->oldKodemapel){
            $rules_mapel = "required|unique:mapels,mapel";
            $rules_kodemapel = "required";
        } else {
            $rules_mapel = "required";
            $rules_kodemapel = "required";
        }

        $rules = [
            'mapel' => $rules_mapel,
            'kode_mapel' => $rules_kodemapel,
            'sks' => 'required',
        ];
        $message = [
            'sks.required' => 'Isi kolom sks!',
            'mapel.required' => 'Isi kolom mata pelajaran!',
            'mapel.unique' => 'Nama mata pelajaran sudah ada!',
            'kode_mapel.required' => 'Isi kode mata pelajaran!',
            'kode_mapel.unique' => 'Kode mata pelajaran sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            $mapel->update([
                'mapel' => $request->mapel,
                'kode_mapel' => $request->kode_mapel,
                'sks' => $request->sks,
            ]);
            return redirect()->route('mapel.index')->with('success', 'Data mata pelajaran berhasil diubah!');
        }
    }
    public function mapel_destroy(Mapel $mapel){
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success','Data mata pelajaran berhasil dihapus!');
    }

    public function siswa_index(){
        $data = Siswa::orderBy('nama','asc')->get();
        return view('admin.siswa_index',compact('data'));
    }
    public function siswa_create(){
        $kelas = Kelas::orderBy('kelas','asc')->get();
        return view('admin.siswa_create', compact('kelas'));
    }
    public function siswa_store(Request $request){
        $nama_ortu = strtoupper($request->nama_ortu);
        $check_nama_ortu = Ortu::where('nama', $nama_ortu)->count();

        if($check_nama_ortu < 1){
            $rules = [
                'nama' => 'required',
                'nisn' => 'required|unique:siswas,nisn',
                'jk' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'kelas' => 'required',
                'username' => 'required|unique:users,username',
                'nama_ortu' => 'required',
                'no_hp_ortu' => 'required',
                'alamat_ortu' => 'required',
                'username_ortu' => 'required|unique:users,username',
            ];
            $message = [
                'nama.required' => 'Isi kolom nama!',
                'nisn.required' => 'Isi kolom NISN!',
                'nisn.unique' => 'NISN sudah ada',
                'jk.required' => 'Pilih jenis kelamin!',
                'agama.required' => 'Pilih agama!',
                'kelas.required' => 'Pilih kelas & jurusan!',
                'no_hp.required' => 'Isi kolom No. HP!',
                'alamat.required' => 'Isi kolom alamat!',
                'nama_ortu.required' => 'Isi kolom nama orang tua!',
                'no_hp_ortu.required' => 'Isi kolom No. HP orang tua!',
                'alamat_ortu.required' => 'Isi kolom alamat orang tua!',
                'username_ortu.required' => 'Isi kolom username orang tua!',
                'username_ortu.unique' => 'Username sudah ada!',
            ];
            $validate = $this->validate($request, $rules, $message);
            if ($validate) {
                User::create([
                    'name' => $nama_ortu,
                    'username' => $request->username_ortu,
                    'password' => Hash::make(12345),
                    'remember_token' => Str::random(60),
                    'role' => 2,
                ]);

                $idOrtuakun = User::where('name', $nama_ortu)->value('id');

                Ortu::create([
                    'nama' => $nama_ortu,
                    'alamat' => $request->alamat_ortu,
                    'no_hp' => $request->no_hp_ortu,
                    'id_akun' => $idOrtuakun
                ]);

                User::create([
                    'name' => strtoupper($request->nama),
                    'username' => $request->username,
                    'password' => Hash::make(12345),
                    'remember_token' => Str::random(60),
                    'role' => 3,
                ]);

                $idJurusan = Kelas::where('id', $request->kelas)->value('id_jurusan');
                $idAkun = User::where('name', strtoupper($request->nama))->value('id');
                $idOrtu = Ortu::where('nama', $nama_ortu)->value('id');

                Siswa::create([
                    'nisn' => $request->nisn,
                    'nama' => strtoupper($request->nama),
                    'jk' => $request->jk,
                    'agama' => $request->agama,
                    'kelas' => $request->kelas,
                    'jurusan' => $idJurusan,
                    'no_hp' => $request->no_hp,
                    'alamat' => $request->alamat,
                    'id_ortu' => $idOrtu,
                    'id_akun' => $idAkun
                ]);

                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');

            }
        } else {
            $rules = [
                'nama' => 'required',
                'nisn' => 'required|unique:siswas,nisn',
                'jk' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'kelas' => 'required',
                'username' => 'required|unique:users,username',
            ];
            $message = [
                'nama.required' => 'Isi kolom nama!',
                'nisn.required' => 'Isi kolom NISN!',
                'nisn.unique' => 'NISN sudah ada',
                'jk.required' => 'Pilih jenis kelamin!',
                'agama.required' => 'Pilih agama!',
                'kelas.required' => 'Pilih kelas & jurusan!',
                'no_hp.required' => 'Isi kolom No. HP!',
                'alamat.required' => 'Isi kolom alamat!',
            ];
            $validate = $this->validate($request, $rules, $message);
            if ($validate) {
                User::create([
                    'name' => strtoupper($request->nama),
                    'username' => $request->username,
                    'password' => Hash::make(12345),
                    'remember_token' => Str::random(60),
                    'role' => 3,
                ]);

                $idAkun = User::where('name', strtoupper($request->nama))->value('id');
                $idOrtu = Ortu::where('nama', $nama_ortu)->value('id');
                $idJurusan = Kelas::where('id', $request->kelas)->value('id_jurusan');

                Siswa::create([
                    'nisn' => $request->nisn,
                    'nama' => strtoupper($request->nama),
                    'jk' => $request->jk,
                    'agama' => $request->agama,
                    'kelas' => $request->kelas,
                    'jurusan' => $idJurusan,
                    'no_hp' => $request->no_hp,
                    'alamat' => $request->alamat,
                    'id_ortu' => $idOrtu,
                    'id_akun' => $idAkun
                ]);

                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
            }
        }

        
    }
    public function siswa_edit(Siswa $siswa){
        $kelas = Kelas::orderBy('kelas','asc')->get();
        return view('admin.siswa_edit', compact('siswa','kelas'));
    }
    public function siswa_update(Request $request, Siswa $siswa){
        $rules = [];
        $input_form = [$request->nisn, $request->username, $request->username_ortu ];
        $old = [$request->oldNisn, $request->oldUsername, $request->oldUsernameortu ];

        for($i = 0; $i < 3; $i++){
            if($input_form[$i] == $old[$i]){
                array_push($rules, 'required');
            } else {
                if($i == 0){
                    array_push($rules,'required|unique:siswas,nisn');
                } else {
                    array_push($rules,'required|unique:users,username');
                }
            }
        }

        $rules = [
            'nisn' => $rules[0],
            'username' => $rules[1],
            'username_ortu' => $rules[2],
            'nama' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'kelas' => 'required',
            'nama_ortu' => 'required',
            'no_hp_ortu' => 'required',
            'alamat_ortu' => 'required',
        ];
        $message = [
            'nama.required' => 'Isi kolom nama!',
            'nisn.required' => 'Isi kolom NISN!',
            'nisn.unique' => 'NISN sudah ada',
            'jk.required' => 'Pilih jenis kelamin!',
            'agama.required' => 'Pilih agama!',
            'kelas.required' => 'Pilih kelas & jurusan!',
            'no_hp.required' => 'Isi kolom No. HP!',
            'alamat.required' => 'Isi kolom alamat!',
            'nama_ortu.required' => 'Isi kolom nama orang tua!',
            'no_hp_ortu.required' => 'Isi kolom No. HP orang tua!',
            'alamat_ortu.required' => 'Isi kolom alamat orang tua!',
            'username_ortu.required' => 'Isi kolom username orang tua!',
            'username_ortu.unique' => 'Username sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            $idJurusan = Kelas::where('id', $request->kelas)->value('id_jurusan');
            $siswa->update([
                'nisn' => $request->nisn,
                'nama' => strtoupper($request->nama),
                'jk' => $request->jk,
                'agama' => $request->agama,
                'kelas' => $request->kelas,
                'jurusan' => $idJurusan,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);

            $idAkun = Siswa::where('nama', strtoupper($request->nama))->value('id_akun');
            $idOrtu = Siswa::where('nama', strtoupper($request->nama))->value('id_ortu');
            $idAkunortu = Ortu::where('id', $idOrtu)->value('id_akun');

            $akun = User::where('id', $idAkun)->get();
            $dataOrtu = Ortu::where('id', $idOrtu)->get();
            $akunOrtu = User::where('id', $idAkunortu)->get();

            $akun[0]->update([
                'name' => strtoupper($request->nama),
                'username' => $request->username
            ]);

            $dataOrtu[0]->update([
                'nama' => strtoupper($request->nama_ortu),
                'alamat' => $request->alamat_ortu,
                'no_hp' => $request->no_hp_ortu,
            ]);

            $akunOrtu[0]->update([
                'name' => strtoupper($request->nama_ortu),
                'username' => $request->username_ortu
            ]);

            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah!');
        }

    }
    
    public function siswa_destroy(Siswa $siswa){
        $akun_siswa = User::where('id',$siswa->id_akun)->get();
        $dataOrtu = Ortu::where('id', $siswa->id_ortu)->get();
        $akunOrtu = User::where('id', $dataOrtu[0]->id_akun)->get();
        $cek_siswa = Siswa::where('id_ortu', $siswa->id_ortu)->count();
        if($cek_siswa > 1){
            $siswa->delete();
            $akun_siswa[0]->delete();
        } else {
            $siswa->delete();
            $akun_siswa[0]->delete();
            $dataOrtu[0]->delete();
            $akunOrtu[0]->delete();
        }
        return redirect()->route('siswa.index')->with('success','Data siswa berhasil dihapus!');
    }

    public function guru_index(){
        $data  = Guru::orderBy('nama', 'asc')->get();
        return view('admin.guru_index', compact('data'));
    }
    public function guru_create(){
        return view('admin.guru_create');
    }
    public function guru_store(Request $request){
        $rules = [
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username' => 'required|unique:users,username',
        ];
        $message = [
            'nama.required' => 'Isi kolom nama!',
            'nip.required' => 'Isi kolom NIP!',
            'nip.unique' => 'NIP sudah ada',
            'jk.required' => 'Pilih jenis kelamin!',
            'agama.required' => 'Pilih agama!',
            'no_hp.required' => 'Isi kolom No. HP!',
            'alamat.required' => 'Isi kolom alamat!',
            'username.required' => 'Isi kolom username!',
            'username.unique' => 'Username sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);
        if ($validate) {
            User::create([
                'name' => strtoupper($request->nama),
                'username' => $request->username,
                'password' => Hash::make(12345),
                'remember_token' => Str::random(60),
                'role' => 1,
            ]);

            $idAkun = User::where('name', strtoupper($request->nama))->value('id');

            Guru::create([
                'nama' => strtoupper($request->nama),
                'nip' => $request->nip,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'id_akun' => $idAkun
            ]);

            return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');

        }
    }
    public function guru_edit(Guru $guru){
        return view('admin.guru_edit', compact('guru'));
    }
    public function guru_update(Request $request, Guru $guru){
        $rules_input = [];
        $input_form = [$request->nip, $request->username];
        $old = [$request->oldNip, $request->oldUsername];

        for($i = 0; $i < 2; $i++){
            if($input_form[$i] == $old[$i]){
                array_push($rules_input, 'required');
            } else {
                if($i == 0){
                    array_push($rules_input,'required|unique:gurus,nip');
                } else {
                    array_push($rules_input,'required|unique:users,username');
                }
            }
        }

        $rules = [
            'nama' => 'required',
            'nip' => $rules_input[0],
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username' => $rules_input[1],
        ];
        $message = [
            'nama.required' => 'Isi kolom nama!',
            'nip.required' => 'Isi kolom NIP!',
            'nip.unique' => 'NIP sudah ada',
            'jk.required' => 'Pilih jenis kelamin!',
            'agama.required' => 'Pilih agama!',
            'no_hp.required' => 'Isi kolom No. HP!',
            'alamat.required' => 'Isi kolom alamat!',
            'username.required' => 'Isi kolom username!',
            'username.unique' => 'Username sudah ada!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if ($validate) {
            $guru->update([
                'nama' => strtoupper($request->nama),
                'nip' => $request->nip,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'kelas' => $request->kelas,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);

            $idAkun = Guru::where('nama', strtoupper($request->nama))->value('id_akun');
            $akun = User::where('id', $idAkun)->get();

            $akun[0]->update([
                'name' => strtoupper($request->nama),
                'username' => $request->username
            ]);

            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diubah!');
        }

    }
    public function guru_destroy(Guru $guru){
        $user = User::findOrFail($guru->id_akun);
        $guru->delete();
        $user->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
    public function jadwal_index(){
        $data = Jadwal::orderBy('id_mapel', 'asc')->get();
        return view('admin.jadwal_index', compact('data'));
    }
    public function jadwal_create(){
        $mapel = Mapel::orderBy('mapel','asc')->get();
        $kelas = Kelas::orderBy('kelas','asc')->get();
        $guru = Guru::orderBy('nama','asc')->get();
        return view('admin.jadwal_create', compact('mapel','kelas','guru'));
    }
    public function jadwal_store(Request $request){
        $rules=[
            'jumlah_pertemuan' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'guru' => 'required',
        ];
        $message=[
            'jumlah_pertemuan.required' => 'Isi kolom jumlah pertemuan!',
            'mapel.required' => 'Pilih mata pelajaran',
            'kelas.required' => 'Pilih kelas',
            'guru.required' => 'Pilih guru',
        ];
        $validate = $this->validate($request, $rules, $message);
        
        if($validate){
            Jadwal::create([
                'jumlah_pertemuan' => $request->jumlah_pertemuan,
                'id_mapel' => $request->mapel,
                'id_kelas' => $request->kelas,
                'id_guru' => $request->guru,
            ]);

            return redirect()->route('jadwal.index')->with('success','Data jadwal berhasil ditambahkan!');
        }
    }
    public function jadwal_edit(Jadwal $jadwal){
        $mapel = Mapel::orderBy('mapel','asc')->get();
        $kelas = Kelas::orderBy('kelas','asc')->get();
        $guru = Guru::orderBy('nama','asc')->get();
        return view('admin.jadwal_edit', compact('jadwal','mapel','kelas','guru'));
    }
    public function jadwal_update(Request $request, Jadwal $jadwal){
        $rules=[
            'jumlah_pertemuan' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'guru' => 'required',
        ];
        $message=[
            'jumlah_pertemuan.required' => 'Isi kolom jumlah pertemuan!',
            'mapel.required' => 'Pilih mata pelajaran',
            'kelas.required' => 'Pilih kelas',
            'guru.required' => 'Pilih guru',
        ];
        $validate = $this->validate($request, $rules, $message);
        
        if($validate){
            $jadwal->update([
                'jumlah_pertemuan' => $request->jumlah_pertemuan,
                'id_mapel' => $request->mapel,
                'id_kelas' => $request->kelas,
                'id_guru' => $request->guru,
            ]);

            return redirect()->route('jadwal.index')->with('success','Data jadwal berhasil diubah!');
        }
    }
    public function jadwal_destroy(Jadwal $jadwal){
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success','Data jadwal berhasil dihapus!');
    }
}
