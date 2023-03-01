@extends('navbar')
@section('konten')

<style>
    .judul{
        background: #80008066;
        width: 25%;
        padding: 5px;
        text-align: center;
        border-radius: 5px;
        transition : 500ms;
        cursor: pointer;
    }
    .judul:hover{
        background: #8000809c;
    }

    .judul2{
        background: #564f5699;
        width: 25%;
        padding: 5px;
        text-align: center;
        border-radius: 5px;
        transition : 500ms;
        cursor: pointer;
        margin-left: 21em;
        margin-top: -7.5em;
    }
    .judul2:hover{
        background: #564f56c2;
    }

    .judul3{
        background: #d31414c2;
        width: 25%;
        padding: 5px;
        text-align: center;
        border-radius: 5px;
        transition : 500ms;
        cursor: pointer;
        margin-left: 42em;
        margin-top: -7.5em;
    }
    .judul3:hover{
        background: #d31414eb;
    }
    .kelas{
        margin-left: 40px;
    }
</style>

<div class="kelas">

<a href="/kelas_10" style="text-decoration: none;color: black;">
<div class="judul">
    <div class="kelas_10">
    <h2>Kelas X</h2>
    <hr>
    <p>Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </div>
</div>
</a>

<a href="/kelas_11" style="text-decoration: none;color: black;">
<div class="judul2">
    <div class="kelas_11">
    <h2>Kelas XI</h2>
    <hr>
    <p>Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </div>
</div>
</a>

<a href="/kelas_12" style="text-decoration: none;color: black;">
<div class="judul3">
    <div class="kelas_12">
    <h2>Kelas XII</h2>
    <hr>
    <p>Pergi Sekarang <i class="fa fa-arrow-right"></i></p>
    </div>
</div>

</div>
@endsection