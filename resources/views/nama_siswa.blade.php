@extends('navbar')
@section('konten')
<style>

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
    background-color: #f2f2f2;
}

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
    transition: 0.3s;
}
.overlay .info input{
    margin: 5px 10px auto;
    width: 90%;
}
.overlay .info select{
    margin-left: 5px;
    width: 30em;
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
.show-hide{
   position:absolute;
   right: 3em;
   top: 66%;
   transform: translateY(-50%);
   cursor: pointer;
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
}
</style>

<form action="/update_jurusan" method="POST">
@csrf
@method('put')

@if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
<input type="hidden" name="ids_jurusan" value="{{$data->id_jurusan}}" />
<b>Jurusan</b> <input type="text" name="jurusan" value="{{$data->jurusan}}" placeholder="Jurusan" style="width: 10%; border-radius: 3px; text-align: center;border: 1px solid black;">

 <button class="btn btn-success"><i class="fa fa-check"></i></button>
 @else
 <b style="background: #d2b5b5; padding: 10px; border-radius: 5px;">Jurusan: {{$data->jurusan}}</b>
 @endif
 <a href="/jurusan/{{$data->id_angkatans}}" class="btn btn-primary">Kembali</a>
</form>

<br>
@if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
<a href="#tambah" style="text-decoration: none">Tambah Nama Siswa</a>
@endif

@php $no = 1;@endphp

<table>
    @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th></th>
        <th>Status</th>
        <th>Hapus</th>
    <tr>

    @else 
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
    <tr>
    @endif

@foreach($data2 as $p )
@if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
    <tr>
        <td>{{$no++}}</td>
        <td><a style="text-decoration: none;" href="/catatan_siswa/{{$p->id_siswa}}">{{$p->nama_siswa}}</a></td>
        <td><input type="hidden" value="tidak aktif" name="status" id="status" /></td>
        <td><button class="btn btn-danger dikeluarkan" lolz="{{$p->id_siswa}}"><i class="fa fa-arrow-down"></i></button></td>
        <td><button isinya="{{$p->id_siswa}}" class="btn btn-danger hapus"><i class="fa fa-trash"></i></button></td>
    </tr>
@else
<tr>    
        <td>{{$no++}}</td>
        <td><a style="text-decoration: none;" href="/catatan_siswa/{{$p->id_siswa}}">{{$p->nama_siswa}}</a></td>
    </tr>
@endif

@endforeach

</table>


<div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambah_nama_siswa" method="POST">
        @csrf
        <h2>Tambah Siswa<a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Nama Siswa</label><br>
        <input class="form-control" type="text" name="siswa" placeholder="Nama Siswa" /><br>


        
         <input class="form-control" type="hidden" value="{{$data->id_jurusan}}" name="id_j" placeholder="Id Jurusan" /><br>
         <input class="form-control" type="hidden" value="{{$data->id_angkatans}}" name="id_a" placeholder="Id Angkatan" />
         
        <button class="btn btn-primary">Tambah</button>
        </form>
            </div>
        </div>
    </div>

    <script>
        $('.hapus').click(function(){
            var id = $(this).attr('isinya');
            //alert(id);

            swal({
                title: "Apakah Anda Ingin Menghapus?",
                text: "Nama Siswa Ini Tidak Akan Dapat Kembali Lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((kalauTerhapus) => {
                if(kalauTerhapus){
                    window.location ="/hapus_nama_siswa/" +id,
                    swal("Nama Siswa Ini Telah Terhapus",{icon: "success"})
                }else{
                    swal("Data Tetap Tersimpan",{icon: "info"})
                }
            })
        })

        $('.dikeluarkan').click(function(){
            var id = $(this).attr('lolz');
            var status = $('#status').val();

            swal({
                title: "Apakah Anda Yakin?!",
                text: "Anak Ini Telah Dikeluarkan?",
                icon: "warning",
                dangerMode: true,
                buttons: true,
            })
            .then((kalauDikeluarkan) => {
                if(kalauDikeluarkan){
                    window.location = "/keluarkan_anak/" +id+'/'+status+'/',
                    swal('Anak Telah Dikeluarkan!',{icon:"success"})
                }else{
                    swal('Anak Tidak Jadi Dikeluarkan',{icon:"info"})
                }
            })
        })
    </script>
@endsection