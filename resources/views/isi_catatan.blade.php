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
        background: #800080bf;
        padding: 5px;
        border: none;
        border-radius: 40%;
        color: #fff;
        margin: auto;
        margin-top: -49px;
        margin-left: 267em;
        transition: 200ms;
    }

    .tombol:hover{
        color: black;
    }


    @media(max-width:4000px){
        .isi_saja{
            width: 90%;
        } 
        .deskripsi{
            width: 90%;
        }
        .tombol{
            margin: 0% 95% auto;
            margin-top: -40px;
        }

        .pesan{
            width: 90%;
        }
        .komentar{
            width: 90%;
        }
    }
    @media(max-width:1420px){
        .isi_saja{
            width: 90%;
        }

        .deskripsi{
            width: 90%;
        }

        .tombol{
            margin: 0% 95% auto;
            margin-top: -40px;
        }

        .pesan{
            width: 90%;
        }
        .komentar{
            width: 90%;
        }

        @media(max-width:542px){
            .tombol{
                margin: -18% 87% auto;
            }
        }

        @media(max-width:415px){
           
            .tombol{
                margin-left: 19em;
                margin-top: -45px;
            }
        }

        @media(max-width:377px){
            .tombol{
                margin-left: 17em;
            }
        }

        @media(max-width:400px){
            .tombol{
                margin-left: 17em;
            }
        }

        @media(max-width:365px){
            .tombol{
                margin-left: 16em;
            }
        }

        @media(max-width:300px){
            .tombol{
                margin-left: 11.5em;
            }
            .isi_saja h2{
                font-size: 20px;
            }
        }
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

<form action="/tambah_komentar" class="pesan" method="POST">
@csrf
<textarea name="komentar" class="form-control komen" placeholder="Tambahkan Komentar"></textarea>
<input type="hidden" class="form-control komen" name="username" value="{{auth()->user()->id}}"  />
<input type="hidden" class="form-control komen" name="id_catatan" value="{{$data->id_catatan}}"  />
<button class="tombol"><i class="fa fa-paper-plane"></i></button>
</form>

<div class="komentar">
    @foreach($komen as $k)
    <div class="isinya" style="background: #a52a2a2b;padding: 5px; margin-left: -5px; width: 100%;">
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