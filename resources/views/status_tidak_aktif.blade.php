@extends('navbar')
@section('konten')
<style>
    a:hover{
        color: black;
        }
    a .dropdown{
        float: right;
        margin: 7px;
        transition: 10s ease;
    }
    table{
        width: 80%;
        margin-top: 4px;
        background: #f3f5f9;
        width: 100%;
    }
    th, td{
        padding: 10px;
    }
    .sub-angkatan{
        display: none;
    }
    .sub-siswa{
        display: none;
    }
</style>

<a href="#" class="form-control angkatan" style="text-decoration: none;">Angkatan<i class="fas fa-angle-right dropdown"></i></a>


<table class="sub-angkatan">
    <tr>
        <th>No</th>
        <th>Angkatan<th>
        <th>Kembalikan</th>
    </tr> 
    

    @php $no = 1 @endphp

    @foreach($data as $k)
        <tr>
            <td>{{$no++}}</td>
            <td><a href="/jurusan/{{$k->id_angkatan}}" style="text-decoration: none">A-{{$k->angkatan}}</a></td>
            <td></td>
            <td>
                <input type="hidden" name="status" id="status" value="aktif" />
                <button class="btn btn-info ulangs" value="{{$k->id_angkatan}}" id="ulang"><i class="fa fa-refresh"></i></button>
            </td>
        </tr>
    @endforeach
</table>
<br>

<a href="#" class="form-control nama_siswa" style="text-decoration: none;">Nama Siswa<i class="fas fa-angle-right dropdown"></i></a>
<table class="sub-siswa">
    <tr>
        <th>No</th>
        <th>Nama<th>
        <th>Kelas<th>
        <th>Jurusan</th>
        <th>Kembalikan</th>
    </tr> 
    

    @php $no = 1 @endphp

    @foreach($data2 as $k)
        <tr>
            <td>{{$no++}}</td>
            <td><a href="/catatan_siswa/{{$k->id_siswa}}" style="text-decoration: none">{{$k->nama_siswa}}</a></td>
            <td></td>
            <td>
                <input type="hidden" name="status" id="status" value="aktif" />
                <button class="btn btn-info ulang" value="{{$k->id_siswa}}"><i class="fa fa-refresh"></i></button>
            </td>
        </tr>
    @endforeach
</table>

<script type="text/javascript">


$('.ulangs').click(function(){
        var ids = $(this).val();
        var status = $('#status').val();
        
        swal({
            title: "Apakah Angkatan Ini Kembali?",
            text: "Jika Anda Mencoba Menekan Tombol Ini Maka Anda Mengembalikan Angkatan Tersebut Kembali Ke Datanya Yang Semula,Apakah Anda Yakin Dengan Ini?",
            icon: "warning",
            buttons: true,
        }).then((kalauKembali) => {
            if(kalauKembali){
                window.location = '/kembali_semula/' +ids+ '/' +status+ '/',
                swal('Berhasil Seperti Semula',{icon: "success"})
            }else{
                swal('Data Anda Tetap Aman',{icon: "info"});
            }
        })
    })

    $('.ulang').click(function(){
        var ids = $(this).val();
        var status = $('#status').val();
        
        swal({
            title: "Apakah Angkatan Ini Kembali?",
            text: "Jika Anda Mencoba Menekan Tombol Ini Maka Anda Mengembalikan Angkatan Tersebut Kembali Ke Datanya Yang Semula,Apakah Anda Yakin Dengan Ini?",
            icon: "warning",
            buttons: true,
        }).then((kalauKembali) => {
            if(kalauKembali){
                window.location = '/kembali_semula_siswa/' +ids+ '/' +status+ '/',
                swal('Berhasil Seperti Semula',{icon: "success"})
            }else{
                swal('Data Anda Tetap Aman',{icon: "info"});
            }
        })
    })

    

    $(document).ready(function(){
        $('.angkatan').click(function(){
            $(this).next('.sub-angkatan').slideToggle();
        });

        $('.nama_siswa').click(function(){
            $(this).next('.sub-siswa').slideToggle();
        })
    })
</script>
@endsection