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

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kepada</th>
        <th>Tanggal</th>
        <th>Penulis</th>
    </tr>

    @php
        $no = 1;
        function tgl_indo($tanggal){
            $bulan = array(
                1=>
                'Januari',
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
            $lol = explode('-',$tanggal);
            return $lol[2].' '.$bulan[(int)$lol[1]].' '.$lol[0];
        }
    @endphp

    @foreach($data as $k)
        <tr>
            <td>{{$no++}}</td>
            <td><a href="/isi_catatan/{{$k->id_catatan}}" style="text-decoration: none;">{{$k->judul}}</a></td>
            <td><a href="/catatan_siswa/{{$k->id_siswas}}" style="text-decoration: none;">{{$k->judul}}</a></td>
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
@endsection