<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\catatan_asrama;
use App\Models\Komentar;
use App\Models\Jurusan;
use App\Models\Angkatan;
use App\Models\Nama_Siswa;

class asramaProject extends Controller
{
    //
    public function postLogin(Request $req){
        if(Auth::attempt($req->only('username','password'))){
            return redirect('home');
        }
        return redirect('/adminLogin');
    }

    public function logout(){
        Auth::logout();
        return redirect('/adminLogin');
    }

    public function tambahPengguna(Request $req){
        $table = new User;
        $table->username = $req->username;
        $table->password = bcrypt($req->password);
        $table->level = "pamong";
        $table->save();
        return back();
    }

    public function lihat_pengguna(){
        $table = User::all();
        return view('pengguna',['data'=>$table]);
    }

    public function edit_pengguna($id){
        $table = User::find($id);
        return response()->json([
            "status" => 200,
            "data" => $table,
        ]);
    }

    public function update_pengguna(Request $req){
        $ids = $req->id;
        $table = User::find($ids);
        $table->username = $req->username;
        $table->password = bcrypt($req->password);
        $table->update();
        return back();
    }

    public function hapus_peng($id){
        $tabel = User::find($id);
        $tabel->delete();
        return back();
    }

    public function tambah_catatan(Request $req){
        $tabel = new catatan_asrama;
        $tabel->judul = $req->judul_catatan;
        $tabel->isi = NULL;
        $tabel->id_siswas = $req->id_siswa;
        $tabel->id_pengguna = $req->id_peng;
        $tabel->tanggal = $req->tanggal;
        $tabel->save();
        return back();
    }

    public function lihat_catatan_pribadi($id){
         // $nama_paket = explode(":", $data["jenis"])[0];
        // $harga_paket = explode(":", $data["jenis"])[1];

        $tabel = catatan_asrama::where('id_pengguna',auth()->user()->id)->with('siswa')->get();
        $buat_siswa = Nama_Siswa::where('status','aktif')->get();
        return view('catatan_pribadi',['data'=>$tabel,'data2' => $buat_siswa]);
    }

    public function lihat_catatan_detail($id){
        $tabel = catatan_asrama::find($id);
        return view('catatan_detail',['data' => $tabel]);
    }

    public function update_catatan(Request $req){
        $ids = $req->id_catatan;
        $tabel = catatan_asrama::find($ids);
        $tabel->judul = $req->judul;
        $tabel->isi = $req->deskripsi;
        $tabel->update();
        return back();
    }

    public function hapus_catatan($id){
        $tabel = catatan_asrama::find($id);
        $tabel->delete();
        return redirect('/catatan_pribadi/{id}');
    }

    public function catatan_publik(){
        $tabel = catatan_asrama::with('pengguna')->get();
        return view('catatan_publik',['data' => $tabel]);
    }

    public function isi_catatan($id){
        $tabel = catatan_asrama::find($id);
        $komentar = Komentar::with('catatan','userz')->where('id_catatans',$id)->get();
        $hitungKomentar = Komentar::where('id_catatans',$id)->count();
        return view('isi_catatan',['data' => $tabel,'komen' => $komentar,'hitung' => $hitungKomentar]);
    }

    public function tambah_komentar(Request $req){
        $tabel = new Komentar;
        $tabel->komentar = $req->komentar;
        $tabel->nama_user = $req->username;
        $tabel->id_catatans = $req->id_catatan;
        $tabel->save();
        return back();
    }

    public function hapus_komentar($id){
        $tabel = Komentar::where('id_komentar',$id);
        $tabel->delete();
        return back();
    }



   public function lihat_kelas_10(){
       $tabel = Jurusan::where('kelas',10)->get();
       return view('kelas_10',['data' => $tabel]);
   }

   public function edit_kelas_10($id){
       $tabel = Jurusan::find($id);
       return response()->json([
           'status' => 200,
           'datas' => $tabel,
       ]);
   }

  


// ------------------+++++++++++++++++++++++-------------------------------------------------------

   public function tambah_angkatan(Request $req){
       $tabel = new Angkatan;
       $tabel->angkatan = $req->angkatan;
       $tabel->status = "aktif";
       $tabel->kelas = $req->kelas;
       $tabel->save();
       return back();
   }

   public function lihat_angkatan_kelas_10(){
      $tabel = Angkatan::where('kelas', 10)->get();
      return view('kelas_10',['data' => $tabel]);
   }


   //////////////////////////////////////PAKAI SWEEET ALLERTTT////////////////////////
   public function update_kelas($id,$kelas){
      $tabel = Angkatan::find($id);
      $tabel->kelas = $kelas;
      $tabel->update();
      return back();
   }
   //////////////////////////////////////////////////////////////////////////////////////////


   public function update_angkatan(Request $req){
    $ids = $req->ids_angkatan;
    $tabel = Angkatan::find($ids);
    $tabel->angkatan = $req->angkatan;
    $tabel->update();
    return back();
   }

   public function hapus_angkatan($id){
       $tabel = Angkatan::find($id);
       $tabel->delete();
       return back();
   }

  
   public function tambah_jurusan(Request $req){
    $tabel = new jurusan;
    $tabel->jurusan = $req->jurusan;
    $tabel->id_angkatans = $req->id_angkatan;
    $tabel->save();
    return back();
}
///////////////////////////////////////////Tandaaa
public function jurusan($id){
       $tabel = Angkatan::find($id);
       $tabel2 = Jurusan::where('id_angkatans',$id)->get();
       return view('jurusan',['data' => $tabel,'data2' => $tabel2]);
   }
////////////////////////////////////////////////
   public function hapus_jurusan($id){
    $tabel = Jurusan::find($id);
    $tabel->delete();
    return back();
}

public function update_jurusan(Request $req){
    $ids = $req->ids_jurusan;
    $tabel = Jurusan::find($ids);
    $tabel->jurusan = $req->jurusan;
    $tabel->update();
    return back();
}

public function lihat_nama_siswa($id){
    $tabel = Jurusan::find($id);
    $tabel2 = Nama_Siswa::where('id_jurusans',$id)->where('status','aktif')->get();
    return view('nama_siswa',['data' => $tabel,'data2' => $tabel2]);
}



public function tambah_nama_siswa(Request $req){
    $tabel = new Nama_Siswa;
    $tabel->nama_siswa = $req->siswa;
    $tabel->status = "aktif";
    $tabel->id_jurusans = $req->id_j;
    $tabel->id_angkatanxx = $req->id_a;
    $tabel->save();
    return back();
}

public function hapus_nama_siswa($id){
    $tabel = Nama_Siswa::find($id);
    $tabel->delete();
    return back();
}

public function keluarkan_anak($id,$status){
    $tabel = Nama_Siswa::find($id);
    $tabel->status = $status;
    $tabel->update();
    return back();
}

public function catatan_siswa($id){


    $tabel = Nama_Siswa::find($id);
    $tabel2 = catatan_asrama::where('id_siswas',$id)->get();
    return view('catatan_siswa',['data' => $tabel,'data2' => $tabel2]);
}

public function update_siswa(Request $req){
    $ids = $req->id_siswa;
    $tabel = Nama_Siswa::find($ids);
    $tabel->nama_siswa = $req->nama_siswa;
    $tabel->update();
    return back();
}

public function lihat_angkatan_kelas_11(){
    $tabel = Angkatan::where('kelas', 11)->get();
    return view('kelas_11',['data' => $tabel]);
 }

 public function lihat_angkatan_kelas_12(){
    $tabel = Angkatan::where('kelas', 12)->where('status','aktif')->get();
    return view('kelas_12',['data' => $tabel]);
 }

 public function update_status_angkatan($id,$status){
    $tabel = Angkatan::find($id);
    $tabel->kelas = 12;
    $tabel->status = $status;
    $tabel->update();
    return back();
 }

 public function status_tidak_aktif(){
    $tabel = Angkatan::where('status','tidak aktif')->get();
    $tabel2 = Nama_Siswa::where('status','tidak aktif')->get();
    return view('status_tidak_aktif',['data' => $tabel,'data2' => $tabel2]);
 }

 public function kembali_semula($ids,$status){
    $tabel = Angkatan::find($ids);
    $tabel->status = $status;
    $tabel->kelas = "12";
    $tabel->update();
    return back();
 }
 public function kembali_semula_siswa($ids,$status){
    $tabel = Nama_Siswa::find($ids);
    $tabel->status = $status;
    $tabel->update();
    return back();
 }
}
