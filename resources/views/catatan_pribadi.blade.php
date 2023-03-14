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

    
            <a href="/home" class="links">Pergi Ke Beranda</a>

            <select class="form-control select" style="width: 10%;">
            <option value="">Kategori</option>
            @foreach($data3 as $d)
            <option value="{{$d->kategori}}">{{$d->kategori}}</option>
            @endforeach
        </select>

        <h2 align="center">Catatan Anda Lainnya</h2>

        <table class="data-table">


        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kepada</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Kategori</th>
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
    <tr data-type="{{$k->kategoris->kategori}}">
        <td>{{$no++}}</td>
        <td><a href="/catatan_detail/{{$k->id_catatan}}" style="text-decoration: none;">{{$k->judul}}</a></td>
        <td><a href="/catatan_siswa/{{$k->id_siswas}}" style="text-decoration: none">{{$k->siswa->nama_siswa ?? "Tidak Ada Data"}}</a></td>
        <td>{{$k->siswa->Jurusanzzz->jurusan }}</td>
        <td>A-{{ $k->siswa->Angkatannn->angkatan }}</td>
        <td>{{$k->kategoris->kategori}}</td>
        <td>{{tgl_indo($k->tanggal)}}</td>
    </tr>
    @endforeach

    </table>

    <script type="text/javascript">
        $('.select').on('change',function(e){
            var pilih = e.target.value;
            var data = $('.data-table');

            if(pilih.length){
                data.find('tr[data-type!='+ pilih +']').hide();
                data.find('tr[data-type='+ pilih + ']').show();
            }else{
                data.find('tr').show();
            }
        })
    </script>

@endsection
