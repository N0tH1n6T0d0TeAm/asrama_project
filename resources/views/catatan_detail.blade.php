@extends('navbar')
@section('konten')

<style>
    .overlay h2{
    font-size: 20px;
    margin-left: 5px;
}
.overlay{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.8);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
}
.overlay:target{
    visibility: visible;
    opacity: 1;
    transition: 0.3s ease-in-out;
}
.overlay .info input{
    margin: 5px 10px auto;
    width: 90%;
}

.overlay .info select{
    margin: 5px 10px auto;
    width: 90%;
}

.overlay .info label{
    margin-left: 5px;
}

.info .lol{
    position: fixed;
    margin: 5% 30% auto;
    background: #fff;
    width: 40%;
    border-radius: 3px;
    padding: 10px 0;
}
.lol button{
    float: right;
    margin: 10px;
}
a.keluar{
    float: right;
    color: black;
    text-decoration: none;
}

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
    .row{
        margin-top: -2.1em;
        margin-left: 7em;
    }

    .row a{
        padding: 2px;
        width: 3%;
    }
    .info .lol .up_kats{
        width: 70%;
    }

    .info .lol .update{
        margin: -6.7% 17% auto;
    }

    .info .lol .hapus_kat{
        margin: -6.7% 85% auto;
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


        .row a{
        width: 7%;
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
        .row a{
        width: 12%;
        }

        .info .lol .update{
        margin: -13% 22% auto;
    }

    .info .lol .hapus_kat{
        padding: 6px;
        margin: -13% 82% auto;
    }


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
                margin-left: 70px;
            }
            .row a{
        width: 12%;
            }

            .info .lol .update{
            padding: 5px;
            margin: -15% 20% auto;
        }

    .info .lol .hapus_kat{
        padding: 5px;
        margin: -17% 82% auto;
    }

    .info .lol .up_kats{
        width: 120%;
    }
        }

    @media(max-width: 1026px){
        .tombol{
                margin-left: 50%;
            }

            .row a{
        width: 12%;
        }
    }


    }



    @media(max-width: 500px) {
  .info .lol{
    margin-left: 1em;
    width: 70%;
  }

  .show-hide{
   position:absolute;
   right: 2em;
   top: 66%;
   transform: translateY(-50%);
   cursor: pointer;
}

.info .lol .up_kats{
        width: 70%;
    }

    .info .lol .update{
        margin: -12% 17% auto;
    }

    .info .lol .hapus_kat{
        margin: -12% 85% auto;
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

    <div id="data">
    <select name="kategori" class="form-control">
        <option value="NULL">Kategori</option>
        @foreach($data2 as $d)
        <option value="{{ $d->id_kategori }}">{{ $d->kategori }}</option>
        @endforeach
    </select>
</div>

    <div class="row">
    <a href="#tambah_kategori" class="btn btn-success" class="kategs">+</a>
    </div>

    <div class="row" style="margin-left: 9em; margin-top: -1.8em; height: 1.8em;width: 90%; color: rgb(255, 255, 255);">
        <a href="#edit_kategori" class="btn btn-warning" class="kategs"><i class="fa fa-pencil-square"></i></a>
        </div>

    <br><br>


    <textarea class="form-control" name="deskripsi" style="height: 30em;"  value="" placeholder="Deskripsi...">{{$data->isi}}</textarea>

    <button class="tombol">Simpan</button>

</form>
</div>

@if($pesan = Session::get('error'))
    <script>alert('{{ $pesan }}')</script>
@endif

<div id="tambah_kategori" class="overlay">
    <div class="info">
        <div class="lol">
    <form action="/tambah_kategori" method="POST">
    @csrf
    <h2>Tambah Kategori <a href="#" class="keluar">&times</a></h2>
    <hr style="border: 1px solid black;margin-top: -3px;">

    <input type="hidden" name="id" id="id"/>

    <label>Kategori</label><br>
    <input class="form-control" type="text" name="kategori" placeholder="Kategori" required /><br>
    <button class="btn btn-primary">Tambah</button>
    </form>
        </div>
    </div>
</div>

 {{-- UPDATES --}}
<div id="edit_kategori" class="overlay">
    <div class="info">
        <div class="lol">
    @csrf
    <h2>Edit Kategori <a href="/catatan_detail/{{$data->id_catatan}}/" class="keluar">&times</a></h2>
    <hr style="border: 1px solid black;margin-top: -3px;">
    <label>Kategori</label><br>
    <div class="alert alert-success d-none">Update Data Berhasil!</div>
    @foreach($data2 as $d)
    <input class="form-control up_kats inputs" ids="{{ $d->id_kategori }}"  type="text" id="{{ $d->id_kategori }}" name="kategori" value="{{ $d->kategori }}" placeholder="Kategori" required /><button class="btn btn-success update" id_kats="{{ $d->id_kategori }}"><i class="fa fa-check"></i></button> <a href="#" class="btn btn-danger hapus_kat" id_h="{{ $d->id_kategori }}"><i class="fas fa-trash"></i></a><br>
    @endforeach
        </div>
    </div>
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

$(document).ready(function() {
  $('.inputs').on('input', function() {
    $(this).val($(this).val().replace(/\s+/g, '-'));
  });
});

$('.update').click(function(){

    var ids = $(this).attr('id_kats');
    var lol2 = $('#'+ids).val();

    $.ajax({
        url : '/update_kategori/'+ids+'/'+lol2+'/',
        method: 'get',
        success: function(result){
            $('.alert-success').removeClass('d-none');
            setTimeout(function(){
                $('.alert-success').addClass('d-none');
            },3000);
        }
    })
})

$(document).on('click','.hapus_kat',function(e){
    e.preventDefault();
    var id_hapus = $(this).attr('id_h');

    swal({
        title: "Apakah Anda Ingin Menghapus Kategori Ini?",
        text: "Jika Anda Menghapus Data Ini Maka Data Ini Akan Hilang Selamanya!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((kategori_hapus) => {
        if(kategori_hapus){
            $.ajax({
                url: "/hapus_kategori/" +id_hapus,
                type: "DELETE",
                data:{
                    _token: '{{ csrf_token() }}'
                },
                success: function(response){
                    swal("Data Berhasil Dihapus",{icon: "success"});
                    window.location.reload();
                }
            })
        }else{
            swal("Data Anda Aman!",{icon: "info"});
        }
    })
})
</script>
@endsection
