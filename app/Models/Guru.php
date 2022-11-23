<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getAkun(){
        return $this->hasOne(User::class,'id','id_akun');
    }
}
