@extends('navbar')
@section('konten')

<style>
    .isi_saja{
        background: #f0f0f0;
        padding: 5 0px;
        width: 100%;
        margin-top: 10px;
    }
    .isi_saja h2{
        margin-left: 10px;;
        font-weight: lighter;
        margin-top: 10px;
        font-size: 25px;
    }

    .deskripsi{
        background: #f2f2f2;
        padding: 5 0px;
        width: 100%;
    }

    .komentar{
        margin-top: 2em;
        margin-left: 5px;
    }

    .komen{
        margin-top: 5px;
    }
    .tombol{
        background: none;
        border: none;
        color: #9cc2ff;
        margin-top: -25px;
        margin-left: 62em;
        transition: 200ms;
    }

    .tombol:hover{
        color: black;
    }


</style>

<a href="/catatan_siswa/{{$data->id_siswas}}" style="text-decoration: none">Kembali</a>
<div class="isi_saja" style="display: flex; gap: 5px;">
    <h2>{{$data->judul}}</h2> @if($data->id_pengguna == auth()->user()->id) <a href="/catatan_detail/{{$data->id_catatan}}" style="text-decoration: none">Edit</a> @else @endif
</div>

<div class="deskripsi" style="margin-top: 5px;">
    <p style="margin-left: 5px;">
        {{$data->isi ?? "Belum Ada Catatan"}}
    </p>
</div>

<br><br>
 
<b>{{$hitung}} Komentar</b>

<form action="/tambah_komentar" method="POST">
@csrf
<textarea name="komentar" class="form-control komen" placeholder="Tambahkan Komentar"></textarea>
<input type="hidden" class="form-control komen" name="username" value="{{auth()->user()->id}}"  />
<input type="hidden" class="form-control komen" name="id_catatan" value="{{$data->id_catatan}}"  />
<button class="tombol"><i class="fa fa-paper-plane"></i></button>
</form>

<div class="komentar">
    @foreach($komen as $k)
    <div class="isinya" style="background: #a52a2a2b;padding: 5px; margin-left: -5px; width: 101%;">
    @if($k->nama_user == auth()->user()->id)
    <pre><b style="color: #6610f2;">Anda</b> {{$k->komentar}} <a href="#" class="hapus" komen-id="{{$k->id_komentar}}">Hapus</a></pre>
    
    @else
    <b>{{$k->userz->username}}</b>  {{$k->komentar}}
    @endif
    <hr>
    </div>
    @endforeach
</div>

<script>
    $('.hapus').click(function(){
         var ids = $(this).attr('komen-id');
         swal({
             title: "Apakah Anda Yakin?",
             text: "Pesan Ini Tidak Akan Bisa Dikembalikan Lagi!",
             dangerMode: true,
             buttons: true,
         })
         .then((kalauTerhapus) => {
             if(kalauTerhapus){
                 window.location = "/hapus_komentar/"+ids;
             }else{
                 
             }
         })
    });
</script>
@endsection