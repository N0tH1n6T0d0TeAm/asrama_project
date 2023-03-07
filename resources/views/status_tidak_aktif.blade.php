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
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
    .kosong{
        display: none;
    }

  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
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
    <thead>
    @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
    <tr>
        <th>No</th>
        <th>Angkatan<th>
        <th>Kembalikan</th>
    </tr> 
    @else
    <tr>
        <th>No</th>
        <th>Angkatan<th>
    </tr>
    @endif
</thead>
    

    @php $no = 1; $no2 = 1 @endphp

    <tbody>
    @foreach($data as $k)
    @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
        <tr>
            <td data-label="no">{{$no++}}</td>
            <td data-label="angkatan"><a href="/jurusan/{{$k->id_angkatan}}" style="text-decoration: none">A-{{$k->angkatan}}</a></td>
            <td class="kosong"></td>
            <td data-label="kembalikan">
                <input type="hidden" name="status" id="status" value="aktif" />
                <button class="btn btn-info ulangs" value="{{$k->id_angkatan}}" id="ulang"><i class="fa fa-refresh"></i></button>
            </td>
        </tr>
    @else
    <tr>
            <td data-label="no">{{$no++}}</td>
            <td data-label="angkatan"><a href="/jurusan/{{$k->id_angkatan}}" style="text-decoration: none">A-{{$k->angkatan}}</a></td>
            <td class="kosong"></td>
        </tr>
    @endif
    @endforeach
</tbody>
</table>
<br>

<a href="#" class="form-control nama_siswa" style="text-decoration: none;">Nama Siswa<i class="fas fa-angle-right dropdown"></i></a>

<table class="sub-siswa">
    <thead>
    @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
        <th>Kembalikan</th>
    @else
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
    @endif
</thead>

<tbody>
    @foreach($data2 as $k)
    @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
    <tr>
            <td data-label="No">{{$no2++}}</td>
            <td data-label="nama siswa"><a href="/catatan_siswa/{{$k->id_siswa}}" style="text-decoration: none">{{$k->nama_siswa}}</a></td>
            <td data-label="kelas">{{$k->Angkatannn->kelas}}</td>
            <td data-label="Jurusan">{{$k->jurusanzzz->jurusan}}</td>
            <td data-label="Angkatan">A-{{$k->Angkatannn->angkatan}}</td>
            <td data-label = "kembalikan">
                <input type="hidden" name="status" id="status" value="aktif" />
                <button class="btn btn-info ulang" value="{{$k->id_siswa}}"><i class="fa fa-refresh"></i></button>
            </td>
        </tr>
    @else
    <tr>
            <td data-label="No">{{$no2++}}</td>
            <td data-label="nama siswa"><a href="/catatan_siswa/{{$k->id_siswa}}" style="text-decoration: none">{{$k->nama_siswa}}</a></td>
            <td data-label="kelas">{{$k->Angkatannn->kelas}}</td>
            <td data-label="Jurusan">{{$k->jurusanzzz->jurusan}}</td>
            <td data-label="Angkatan">A-{{$k->Angkatannn->angkatan}}</td>
    </tr>
    @endif
    @endforeach
</tbody>
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