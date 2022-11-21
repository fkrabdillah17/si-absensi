<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getJurusan(){
        return $this->belongsTo(Jurusan::class,'id_jurusan','id');
    }
}
