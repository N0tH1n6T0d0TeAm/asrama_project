<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;
    protected $table = 'angkatan';
    public $timestamps = false;
    protected $primaryKey = 'id_angkatan';

    public function jurusan(){
        return $this->belongsTo('App\Models\Jurusan','id_jurusanz');
    }
}
