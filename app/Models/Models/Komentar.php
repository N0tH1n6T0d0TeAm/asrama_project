<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'komentar';
    protected $primaryKey = 'id_catatans';

    public function catatan(){
        return $this->belongsTo('\App\Models\catatan_asrama','id_catatan');
    }

    public function userz(){
        return $this->belongsTo('\App\Models\User','nama_user');
    }
}
