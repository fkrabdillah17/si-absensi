<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getMapel(){
        return $this->belongsTo(Mapel::class,'mapel','id');
    }
    public function getGuru(){
        return $this->belongsTo(Guru::class,'guru','id');
    }
    public function getKelas(){
        return $this->belongsTo(Kelas::class,'kelas','id');
    }
    public function getSiswa(){
        return $this->belongsTo(Siswa::class,'siswa','id');
    }

}
