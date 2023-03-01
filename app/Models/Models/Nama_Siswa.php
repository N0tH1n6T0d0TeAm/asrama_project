<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nama_Siswa extends Model
{
    use HasFactory;
    protected $table = 'nama_siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

    public function jurusanzzz(){
        return $this->belongsTo(Jurusan::class,'id_jurusans');
    }

    public function Angkatannn(){
        return $this->belongsTo(Angkatan::class,'id_angkatanxx');
    }
}


