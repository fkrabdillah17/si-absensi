<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getAkun(){
        return $this->hasOne(User::class,'id','id_akun');
    }

    public function getOrtu(){
        return $this->belongsTo(Ortu::class,'id_ortu','id');
    }

    public function getKelas(){
        return $this->belongsTo(Kelas::class,'kelas','id');
    }

}
