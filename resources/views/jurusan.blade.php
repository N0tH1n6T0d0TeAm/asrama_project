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
    margin-left: 5px;
    width: 30em;
}
.overlay .info select{
    margin-left: 5px;
    width: 30em;
}
.overlay .info label{
    margin-left: 5px;
}

.info .lol{
    margin-left: 25em;
    background: #fff;
    width: 40%;
    text-align: justify;
    height: 13em;
    border-radius: 3px;
    padding: 10px 0;
}
.lol button{
    margin-left: 25em;
    margin-top: -25px;
}
a.keluar{
    margin-left: 15em;
    color: black;
    text-decoration: none;
}
</style>

<form action="/update_angkatan" method="POST">
@csrf
@method('put')

<input type="hidden" name="ids_angkatan" value="{{$data->id_angkatan}}" />
<b>A-</b> <input type="number" name="angkatan" value="{{$data->angkatan}}" placeholder="Angkatan" style="width: 10%; border-radius: 3px; border: 1px solid black;">

 <button style="" class="btn btn-success"><i class="fa fa-check"></i></button>

 <a href="/kelas_{{$data->kelas}}" class="btn btn-primary">Kembali</a>
</form>

<br>
<a href="#tambah" style="text-decoration: none">Tambah Jurusan</a>

<table>
    <tr>
        <th>No</th>
        <th>Jurusan</th>
        <th>Hapus</th>
    </tr>


@php $no = 1 @endphp
@foreach($data2 as $p)
    <tr>
        <td>{{$no++}}</td>
        <td><a style="text-decoration: none;" href="/nama_siswa/{{$p->id_jurusan}}">{{$p->jurusan}}</a></td>
        <td><button isinya="{{$p->id_jurusan}}" class="btn btn-danger hapus"><i class="fa fa-trash"></i></button></td>
    </tr>
@endforeach
</table>


<div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambah_jurusan" method="POST">
        @csrf
        <h2>Tambah Jurusan<a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Jurusan</label><br>
        <input class="form-control" type="text" name="jurusan" placeholder="Jurusan" /><br>


        
         <input class="form-control" type="hidden" value="{{$data->id_angkatan}}" name="id_angkatan" placeholder="Kelas" /><br>
         
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
                title: "Apakah Anda Ingin Menghapus Jurusan Ini?",
                text: "Jurusan Ini Tidak Akan Dapat Kembali Lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((kalauTerhapus) => {
                if(kalauTerhapus){
                    window.location ="/hapus_jurusan/" +id,
                    swal("Jurusan Ini Telah Terhapus",{icon: "success"})
                }else{
                    swal("Data Tetap Tersimpan",{icon: "info"})
                }
            })
        })
    </script>
@endsection