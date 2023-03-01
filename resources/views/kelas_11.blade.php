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

    <a href="#tambah" style="text-decoration: none">Tambah Angkatan</a>


   <table>
        <tr>
            <th>Angkatan</th>
            <th>Naik Kelas</th>
            <th>
            <th>Hapus</th>
        </tr>

        @foreach($data as $p)
            <tr>
                <td><a href="/jurusan/{{$p->id_angkatan}}" style="text-decoration: none">A-{{$p->angkatan}}</a></td>
                
                <td><button type="button" lolz="{{$p->id_angkatan}}" class="btn btn-success hmm" title="Naik Kelas"><i class="fa fa-arrow-right"></i></button></td>
                <td><input type="hidden" style="width: 5%;" id="kelas" name="kelas" value="12"></td>
                <td><button zzz="{{$p->id_angkatan}}" class="btn btn-danger hapus"><i class="fa fa-trash"></i></button></td>
            </tr>
        @endforeach
   </table>



    <div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambahAngkatan" method="POST">
        @csrf
        <h2>Tambah Angkatan<a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Angkatan</label><br>
        <input class="form-control" type="number" name="angkatan" placeholder="Angkatan" /><br>


        
         <input class="form-control" type="hidden" value="11" name="kelas" placeholder="Kelas" /><br>
         
        <button class="btn btn-primary">Tambah</button>
        </form>
            </div>
        </div>
    </div>

    <script>
    $('.hmm').click(function(){
        var id = $(this).attr('lolz');
        var kelas = $('#kelas').val();
        
        swal({
            title: "Anda Yakin?",
            text: "Apakah Anda Yakin Angkatan Ini Dinyatakan Naik Kelas?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((update) => {
            if(update){
                window.location = "/update_kelas/"+id+'/'+kelas+ '/',
                swal('Telah Naik Kelas')
            }else{
                swal('Tidak Jadi')
            }
        })
    });

    $('.hapus').click(function(){
        var ids = $(this).attr('zzz');
        //alert(ids)

        swal({
            title: "Apakah Anda Ingin Hapus?",
            text: "Data Ini Tidak Akan Kembali Selamanya!",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((kalauTerhapus) => {
            if(kalauTerhapus){
                window.location = "/hapus_angkatan/" +ids,
                swal("Berhasil Menghapus",{icon: "info"});
            }else{
                swal("Data Tetap Tersimpan!")
            }
        })
    })
    </script>
@endsection