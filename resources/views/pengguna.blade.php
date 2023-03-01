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
    margin-left: 50em;
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
    margin-left: 25em;
    background: #fff;
    width: 40%;
    text-align: justify;
    height: 18em;
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
.show-hide{
   position:absolute;
   right: 24em;
   top: 37%;
   transform: translateY(-50%);
   cursor: pointer;
}
</style>
</head>
<body>


<a href="#tambah" class="links">Tambah Pengguna</a>
<table>
  <tr>
  <th>No</th>
  <th>Nama</th>
  <th>Status</th>
  <th>Update</th>
  <th>Hapus</th>
  </tr>


@php
    $no = 1;
@endphp
  @foreach($data as $p)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$p->username}}</td>
        <td>
            @if($p->isOnline())
                <li class="text-success">&#x2022; Online</li>
            @else
                <li class="text-muted">&#x2022; Offline</li>
            @endif
        </td>
       
        <td>
         @if(auth()->user()->id == $p->id)
        <a href="#update"><button class="btn btn-success updates" value="{{$p->id}}"><i class="fa fa-pencil-square"></i></button></a>
         @endif
        </td>
       
        <td>
        @if(auth()->user()->id != $p->id)
        <a href="#" class="btn btn-danger hapus" id_data="{{$p->id}}"><i class="fa fa-trash"></i></a>
        @endif
        </td>
    </tr>
  @endforeach
</table>


    <div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambahPengguna" method="POST">
        @csrf
        <h2>Tambah Pengguna <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Nama Pengguna</label><br>
        <input class="form-control" type="text" name="username" placeholder="Nama Pengguna" /><br>
        <label>Password</label><br>
        <input class="form-control" type="password" value="Rahasia" name="password" id="pass2" placeholder="Password" /><span toggle="#password-field" class="show-hide"><i class="fas fa-eye toggle-password"></i></span><br>
        <button class="btn btn-primary">Tambah</button>
        </form>
            </div>
        </div>
    </div>

    <div id="update" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/update_pengguna" method="POST">
        @csrf
        @method('PUT')
        <h2>Update Pengguna <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">

        <input type="hidden" name="id" id="id"/>

        <label>Nama Pengguna</label><br>
        <input id="nama" class="form-control" type="text" name="username" placeholder="Nama Pengguna" /><br>
        <label>Password</label><br>
        <input class="form-control" type="password" value="Rahasia" name="password" id="pass" placeholder="Password" /><span toggle="#password-field" class="show-hide"><i class="fas fa-eye toggle-password"></i></span><br>
        <button class="btn btn-primary">Tambah</button>
        </form>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){
        $(document).on('click','.updates',function(){
            var id = $(this).val();
            //alert(id);
            $.ajax({
                type: "GET",
                url: "/edit-pengguna/"+id,
                success: function(response){
                    console.log(response.data.username);
                    $('#nama').val(response.data.username);
                    $('#id').val(id);
                    
                }
            }); 
        });
    });

    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var x = document.getElementById("pass")
    if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});

 $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var x = document.getElementById("pass2")
    if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});


$('.hapus').click(function(){
var id = $(this).attr('id_data'); 
    swal({
  title: "Apakah Anda Yakin?",
  text: "Jika Anda Hapus,Akun Ini Akan Terhapus Selamanya!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Akun Berhasil Terhapus", {
      icon: "success",
    });
    window.location = "/hapus_peng/"+id+""
  } else {
    swal("Akun Ini Aman");
  }
});
})
</script>
@endsection