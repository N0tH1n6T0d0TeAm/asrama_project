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
    margin-left: 20em;
    background: #fff;
    width: 45%;
    text-align: justify;
    height: 20em;
    border-radius: 3px;
    padding: 10px 0;
    
}
.lol button{
    margin-left: 25em;
    margin-top: -5px;
}
a.keluar{
    margin-left: 15em;
    color: black;
    text-decoration: none;
}
</style>

<form action="/update_siswa" method="POST">
@csrf
@method('put')

<input type="hidden" name="id_siswa" value="{{$data->id_siswa}}" />
 <input type="text" name="nama_siswa" value="{{$data->nama_siswa}}" placeholder="Jurusan" style="width: 30%; border-radius: 3px; text-align: center;border: 1px solid black; padding: 5px;">

 <button class="btn btn-success"><i class="fa fa-check"></i></button>

 <a href="/nama_siswa/{{$data->id_jurusans}}" style="text-decoration: none" class="btn btn-primary">Kembali</a><br><br>

 <a href="#tambah" style="text-decoration: none">Tambah Judul</a>
</form>

@php
    function tgl_indo($tanggal){
        $bulan = array(
            1=>'Janurari',
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
<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Penulis</th>
    </tr>
    

    @php $no = 1; @endphp

    @foreach($data2 as $k)
    <tr>
        <td>{{$no++}}</td>
        <td><a href="/isi_catatan/{{$k->id_catatan}}">{{$k->judul}}</a></td>
        <td>{{tgl_indo($k->tanggal)}}</td>
        <td>
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
@endsection 