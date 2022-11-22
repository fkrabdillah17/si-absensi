<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
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

}
