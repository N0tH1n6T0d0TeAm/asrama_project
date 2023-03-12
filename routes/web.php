<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\asramaProject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('test','test');

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('login');


Route::view('navbar','navbar');

Route::post('postLogin',[asramaProject::class,'postLogin']);
Route::get('logout',[asramaProject::class,'logout']);

Route::group(['middleware'=>['auth']],function(){
    Route::view('home','home');
   // Route::view('real','real');

    Route::view('pengguna','pengguna');
    Route::get('pengguna',[asramaProject::class,'lihat_pengguna']);
    Route::post('tambahPengguna',[asramaProject::class,'tambahPengguna']);
    Route::get('edit-pengguna/{id}',[asramaProject::class,'edit_pengguna']);
    Route::put('update_pengguna',[asramaProject::class,'update_pengguna']);
    Route::get('hapus_peng/{id}',[asramaProject::class,'hapus_peng']);

    Route::view('catatan_pribadi','catatan_pribadi');
    Route::post('tambah_catatan',[asramaProject::class,'tambah_catatan']);
    Route::get('catatan_pribadi/{id}',[asramaProject::class,'lihat_catatan_pribadi']);

    Route::view('catatan_detail','catatan_detail');
    Route::get('catatan_detail/{id}',[asramaProject::class,'lihat_catatan_detail']);
    Route::put('update_catatan',[asramaProject::class,'update_catatan']);
    Route::get('/hapus_catatan/{id}',[asramaProject::class,'hapus_catatan']);

    Route::view('catatan_publik','catatan_publik');
    Route::get('catatan_publik',[asramaProject::class,'catatan_publik']);

    Route::view('isi_catatan','isi_catatan');
    Route::get('isi_catatan/{id}',[asramaProject::class,'isi_catatan']);
    Route::post('/tambah_komentar',[asramaProject::class,'tambah_komentar']);
    Route::get('/hapus_komentar/{id}',[asramaProject::class,'hapus_komentar']);

    Route::view('kelas_10','kelas_10');
    Route::post('tambahAngkatan',[asramaProject::class,'tambah_angkatan']);
    Route::get('kelas_10',[asramaProject::class,'lihat_angkatan_kelas_10']);
    Route::get('update_kelas/{id}/{kelas}',[asramaProject::class,'update_kelas']); //Update Kelas Pakai Sweet Alert
    Route::get('hapus_angkatan/{id}',[asramaProject::class,'hapus_angkatan']);
    Route::put('update_angkatan',[asramaProject::class,'update_angkatan']);

    Route::view('jurusan','jurusan');
    Route::get('jurusan/{id}',[asramaProject::class,'jurusan']);
    Route::post('tambah_jurusan',[asramaProject::class,'tambah_jurusan']);
    Route::put('update_jurusan',[asramaProject::class,'update_jurusan']);
    Route::get('hapus_jurusan/{id}',[asramaProject::class,'hapus_jurusan']);

    Route::view('nama_siswa','nama_siswa');
    Route::get('nama_siswa/{id}',[asramaProject::class,'lihat_nama_siswa']);
    Route::post('tambah_nama_siswa',[asramaProject::class,'tambah_nama_siswa']);
    Route::get('hapus_nama_siswa/{id}',[asramaProject::class,'hapus_nama_siswa']);
    Route::get('keluarkan_anak/{id}/{status}',[asramaProject::class,'keluarkan_anak']);

    Route::view('catatan_siswa','catatan_siswa');
    Route::get('catatan_siswa/{id}',[asramaProject::class,'catatan_siswa']);
    Route::put('update_siswa',[asramaProject::class,'update_siswa']);

    Route::view('kelas_11','kelas_11');
    Route::get('kelas_11',[asramaProject::class,'lihat_angkatan_kelas_11']);

    Route::view('kelas_12','kelas_12');
    Route::get('kelas_12',[asramaProject::class,'lihat_angkatan_kelas_12']);
    Route::get('update_status_angkatan/{id}/{status}',[asramaProject::class,'update_status_angkatan']);

    Route::view('status_tidak_aktif','status_tidak_aktif');
    Route::get('status_tidak_aktif',[asramaProject::class,'status_tidak_aktif']);
    Route::get('kembali_semula/{ids}/{status}',[asramaProject::class,'kembali_semula']);
    Route::get('kembali_semula_siswa/{ids}/{status}',[asramaProject::class,'kembali_semula_siswa']);

    Route::post('tambah_kategori',[asramaProject::class,'tambah_kategori']);
    Route::get('update_kategori/{ids}/{lol2}',[asramaProject::class,'update_kategori']);
    Route::delete('hapus_kategori/{id_hapus}',[asramaProject::class,'hapus_kategori']);
});
