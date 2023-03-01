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
</style>

<form action="/update_siswa" method="POST">
@csrf
@method('put')

<input type="hidden" name="id_siswa" value="{{$data->id_siswa}}" />
 <input type="text" name="nama_siswa" value="{{$data->nama_siswa}}" placeholder="Jurusan" style="width: 30%; border-radius: 3px; text-align: center;border: 1px solid black; padding: 5px;">

 <button class="btn btn-success"><i class="fa fa-check"></i></button>

 <a href="/nama_siswa/{{$data->id_jurusans}}" class="btn btn-primary">Kembali</a>
</form>

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
        <td>{{$k->tanggal}}</td>
        <td>{{$k->pengguna->username}}</td>
    </tr>
    @endforeach
</table>
@endsection 