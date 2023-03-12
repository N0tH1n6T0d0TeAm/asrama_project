@extends('navbar')
@section('konten')
<style>
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

  table td:last-child {
    border-bottom: 0;
  }
}
</style>


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


<select class="form-control filter-handle">
<option value="">Kategori</option>
@foreach($data2 as $ks)
<option value="{{ $ks->kategori }}">{{ $ks->kategori }}</option>
@endforeach
</select><br>

<table class="filter-table-data">
    <thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Kepada</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
        <th>Tanggal</th>
        <th>Penulis</th>
    </tr>
</thead>


    @foreach($data as $k)

        <tr data-type="{{ $k->kategoris->kategori ?? '' }}">
            <td data-label="no">{{$no++}}</td>
            <td data-label="judul"><a href="/isi_catatan/{{$k->id_catatan}}" style="text-decoration: none;">{{$k->judul}}</a></td>
            <td data-label="Kategori">{{ $k->kategoris->kategori ?? "Belum Ada Kategori" }}</td>
            <td data-label="Nama Siswa"><a href="/catatan_siswa/{{$k->id_siswas}}" style="text-decoration: none;">{{$k->siswa->nama_siswa}}</a></td>
            <td data-label="Kelas">{{$k->siswa->Angkatannn->kelas}}</td>
            <td data-label="jurusan">{{$k->siswa->jurusanzzz->jurusan}}</td>
            <td data-label="angkatan">A-{{$k->siswa->Angkatannn->angkatan}}</td>
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

<script>
    $('.filter-handle').on('change', function(e) {

  var location = e.target.value;
  var table = $('.filter-table-data');

  if (location.length) {

    table.find('tr[data-type!=' + location + ']').hide();

    table.find('tr[data-type=' + location + ']').show();
  } else {
    
    table.find('tr').show();
  }
});
</script>
@endsection
