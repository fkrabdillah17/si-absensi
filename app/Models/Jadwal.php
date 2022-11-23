<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getMapel(){
        return $this->belongsTo(Mapel::class,'id_mapel','id');
    }
    public function getGuru(){
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
    public function getKelas(){
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }

}
