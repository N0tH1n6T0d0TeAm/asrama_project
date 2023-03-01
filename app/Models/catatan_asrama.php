<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan_asrama extends Model
{
    use HasFactory;
    protected $table = 'catatan';
    public $timestamps = false;
    protected $primaryKey = 'id_catatan';
    protected $fillable = [
        'judul','isi','id_pengguna','tanggal'
    ];

    
    public function pengguna(){
        return $this->belongsTo('\App\Models\User','id_pengguna');
    }

    public function siswa(){
        return $this->belongsTo('\App\Models\Nama_Siswa','id_siswas');
    }
}
