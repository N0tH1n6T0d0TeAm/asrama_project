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

.links{
    Text-Decoration: None !important;
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
    height: 27em;
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

    <table>
            <a href="#tambah" class="links">Tambah Judul</a>
        <table>

        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kepada</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Tanggal</th>
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

            $meledak = explode('-',$tanggal);
            return $meledak[2].' '.$bulan[(int)$meledak[1]].' '.$meledak[0];
        }
        @endphp     

    @foreach($data as $k)
    <tr>
        <td>{{$no++}}</td>
        <td><a href="/catatan_detail/{{$k->id_catatan}}" style="text-decoration: none;">{{$k->judul}}</a></td>
        <td><a href="/catatan_siswa/{{$k->id_siswas}}" style="text-decoration: none">{{$k->siswa->nama_siswa ?? "Tidak Ada Data"}}</a></td>
        <td></td>
        <td></td>
        <td>{{tgl_indo($k->tanggal)}}</td>
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
        <label>Nama Siswa</label><br>
        <select name="nama_siswa" class="form-control">
            <option>Pilih</option>
            @foreach($data2 as $k)
            <option value="{{$k->id_siswa ?? 'Null'}}:{{$k->jurusanzzz->id_jurusan}}:{{$k->Angkatannn->id_angkatan}}">{{$k->nama_siswa ?? "Tidak Ada Data"}} ({{$k->jurusanzzz->jurusan ?? "Tidak Ada Data"}}) (A-{{$k->Angkatannn->angkatan ?? "Tidak Ada Data"}})</option>
        @endforeach

        </select><br>
        <label>Tanggal Buat</label><br>
        <input class="form-control" type="date" value="{{\Carbon\Carbon::now()->toDateString()}}" name="tanggal"/><br>
        <input class="form-control" type="hidden" name="id_peng" value="{{auth()->user()->id}}" placeholder="penulis" />
        <button class="btn btn-primary">Tambah</button>
        </form>
            </div>
        </div>
    </div>
@endsection