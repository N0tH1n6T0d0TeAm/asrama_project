@extends('navbar')
@section('konten')

<style>
    .isi{
        background: #fff;
        padding: 10px;
        border-radius: 10px;
    }
    .judul{
        width: 60%;
        height: 3em;
    }
    .tombol{
        margin-left: 27em;
        margin-top: 5px;
        background: #4b4276;
        border: none;
        padding: 8px;
        color: white;
        border-radius: 5px;
        transition: 500ms;
    }
    .tombol:hover{
        background: #4b4276a8; 
    }
    .isi .theButtons{
        margin-left: 50em;
        margin-top: -40px;
    }
    .kembali{
        margin-left: -3em;
    }
    @media(max-width: 4000px){
        .isi .theButtons{
            margin: -3% 70% auto;
            width: 250px;
        }
    }

    @media(max-width:1420px){
        .isi .theButtons{
            margin: -5% 70% auto;
            width: 288px;
        }
    
    @media(max-width: 770px){
        .isi{
            overflow: hidden;
        }
        .isi .theButtons{
            display: flex;
            flex-direction: column;
        }

        .kembali{
            width: 30%;
            margin-left: 10px;
            margin-top: -30px;
        }
        .hapus{
            width: 110%;
            margin-top: 20px;
            margin-left: -14em;
            padding: 2px;
        }
        .tombol{
            margin-left: 9em;
        }
    }

    @media(max-width: 400px){
            .isi{
                overflow: hidden;
            }
            .kembali{
                margin-left: -12px;
                width: 28%;
            }

            .hapus{
                width: 80%;
                margin-left: -10em;
            }
            .tombol{
                margin-left: 130px;
            }
        }

    @media(max-width: 300px){
            .tombol{
                margin-left: 80px;
            }
        }

    @media(max-width: 1026px){
        .tombol{
                margin-left: 50%;
            }
    }
    }
</style>
<div class="isi">
<form action="/update_catatan" method="POST">
@csrf
@method('put')
    <input type="hidden" name="id_catatan" value="{{$data->id_catatan}}">
    <input type="text" class="form-control judul" name="judul"  value="{{$data->judul}}" placeholder="Judul"/>

    <div class="theButtons">
    <a href="/isi_catatan/{{$data->id_catatan}}" class="btn btn-primary kembali">Kembali</a>
    <a href="#" style="color: white" class="btn btn-danger hapus" id-saja="{{$data->id_catatan}}">Hapus Catatan Ini !</a>
    </div>

    <hr>


    <textarea class="form-control" name="deskripsi" style="height: 30em;"  value="" placeholder="Deskripsi...">{{$data->isi}}</textarea>

    <button class="tombol">Simpan</button>

</form>
</div>

<script>
$('.hapus').click(function(){
    var id = $(this).attr('id-saja');
    
    swal({
        title: "Apakah Anda Yakin? ",
        icon: "warning",
        text: "Semua Catatan Ini Akan Hilang Dan Tak Dapat Dikembalikan!",
        dangerMode: true,
        buttons: true,
    })
    .then((kalauTerhapus) => {
        if(kalauTerhapus){
            window.location = '/hapus_catatan/'+id;
            swal('Berhasil Menghapus Data Ini!',{icon: "success"})
        }else{
            swal('Data Anda Aman',{icon: "info"});
        }
    })
})
</script>
@endsection