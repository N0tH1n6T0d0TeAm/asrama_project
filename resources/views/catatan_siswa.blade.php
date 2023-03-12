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
.kategori_pilih{
    width: 18%;
    margin-top: -2em;
    margin-left: 7em;
}
@media(max-width: 600px){
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

<form action="/update_siswa" method="POST">
@csrf
@method('put')
@if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
<input type="hidden" name="id_siswa" value="{{$data->id_siswa}}" />
 <input type="text" name="nama_siswa" value="{{$data->nama_siswa}}" placeholder="Jurusan" style="width: 30%; border-radius: 3px; text-align: center;border: 1px solid black; padding: 5px;">

 <button class="btn btn-success"><i class="fa fa-check"></i></button>
 @else
 <b style="background: #d2b5b5; padding: 10px; border-radius: 5px;">{{$data->nama_siswa}}</b>
@endif

 <a href="/nama_siswa/{{$data->id_jurusans}}" style="text-decoration: none" class="btn btn-primary">Kembali</a><br><br>
 @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
 <a href="#tambah" style="text-decoration: none">Tambah Judul</a>
 @endif
</form>

<select class="form-control kategori_pilih">
    <option value="">Kategori</option>
    @foreach($data3 as $d)
    <option value="{{ $d->kategori }}">{{ $d->kategori }}</option>
    @endforeach
</select>

@php
    function tgl_indo($tanggal){
        $bulan = array(
            1=>'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $hmm = explode('-',$tanggal);
        return $hmm = $hmm[2].' '.$bulan[(int)[1]].' '.$hmm[0];
    }
@endphp
<table class="table-data">
    <thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Penulis</th>
    </tr>
</thead>


    @php $no = 1; @endphp

    @foreach($data2 as $k)
    <tr data-type="{{ $k->kategoris->kategori ?? '' }}">
        <td data-label="no">{{$no++}}</td>
        <td data-label="judul"><a href="/isi_catatan/{{$k->id_catatan}}">{{$k->judul}}</a></td>
        @if($k->id_kats == NULL)
        <td data-label="kategori" style="color:red;">Tidak Ada Kategori</td>
        @else
        <td data-label="kategori">{{ $k->kategoris->kategori ?? "Belum Ada Kategori" }}</td>
        @endif
        <td data-label="tanggal">{{tgl_indo($k->tanggal)}}</td>
        <td data-label="penulis">
            @if($k->id_pengguna == auth()->user()->id)
            <b>Anda</b>
            @else
            {{$k->pengguna->username}}
            @endif
        </td>
    </tr>
    @endforeach
</table>

<div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambah_catatan" method="POST">
        @csrf
        <h2>Tambah Catatan <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Judul Catatan</label><br>
        <input class="form-control" type="text" name="judul_catatan" placeholder="Judul Catatan" /><br>
        <label>Tanggal Buat</label><br>
        <input class="form-control" type="date" value="{{\Carbon\Carbon::now()->toDateString()}}" name="tanggal"/><br>
        <input class="form-control" type="hidden" name="id_peng" value="{{auth()->user()->id}}" placeholder="penulis" />
        <input type="hidden" name="id_siswa" value="{{$data->id_siswa}}" />
        <button class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <script>
        $('.kategori_pilih').on('change',function(e){
            var lol = e.target.value;
            var data = $('.table-data');

            if(lol.length){
                data.find('tr[data-type!='+ lol +']').hide();
                data.find('tr[data-type='+ lol +']').show();
            }else{
                data.find('tr').show();
            }
        })
    </script>
@endsection
