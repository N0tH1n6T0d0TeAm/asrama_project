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
    margin: 5px 10px auto;
    width: 90%;
}

.overlay .info select{
    margin: 5px 10px auto;
    width: 90%;
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
</head>
<body>


<a href="#tambah" class="links">Tambah Pengguna</a>
<table>
  <thead>
  <tr>
  <th>No</th>
  <th>Nama</th>
  <th>Status</th>
  <th>Update</th>
  <th>Hapus</th>
  </tr>
</thead>

<tbody>
@php
    $no = 1;
@endphp
  @foreach($data as $p)
    <tr>
        <td data-label = "no">{{$no++}}</td>
        <td data-label = "username">{{$p->username}}</td>
        <td data-label = "status">
            @if($p->isOnline())
                <li class="text-success">&#x2022; Online</li>
            @else
                <li class="text-muted">&#x2022; Offline</li>
            @endif
        </td>
       
        <td data-label = "Update">
         @if(auth()->user()->id == $p->id)
        <a href="#update"><button class="btn btn-success updates" value="{{$p->id}}"><i class="fa fa-pencil-square"></i></button></a>
        @else
        <br>
         @endif
        </td>
       
        <td data-label = "hapus">
        @if(auth()->user()->id != $p->id)
        <a href="#" class="btn btn-danger hapus" id_data="{{$p->id}}"><i class="fa fa-trash"></i></a>
        @endif
        </td>
    </tr>
  @endforeach
</tbody>
</table>


    <div id="tambah" class="overlay">
        <div class="info">
            <div class="lol">
        <form action="/tambahPengguna" method="POST">
        @csrf
        @if(auth()->user()->level == "pamong" || auth()->user()->level == "superadmin")
        <h2>Tambah Pengguna <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Nama Pengguna</label><br>
        <input class="form-control" type="text" name="username" placeholder="Nama Pengguna" /><br>
        <input class="form-control" type="hidden" name="level" placeholder="Level" value="pamong" />
        <label>Password</label><br>
        <input class="form-control" type="password" value="Rahasia" name="password" id="pass2" placeholder="Password" /><span toggle="#password-field" class="show-hide"><i class="fas fa-eye toggle-password"></i></span><br>
        <button class="btn btn-primary">Tambah</button>
        @elseif(auth()->user()->level == "guru")
        <h2>Tambah Pengguna <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Nama Pengguna</label><br>
        <input class="form-control" type="text" name="username" placeholder="Nama Pengguna" /><br>
        

        <input class="form-control" type="hidden" value="guru" name="level" placeholder="Level" />
        
        <label>Password</label><br>
        <input class="form-control" type="password" value="Rahasia" name="password" id="pass2" placeholder="Password" /><span toggle="#password-field" class="show-hide"><i class="fas fa-eye toggle-password"></i></span><br>
        <button class="btn btn-primary">Tambah</button>

        @else(auth()->user()->level == "yayasan")
        <h2>Tambah Pengguna <a href="#" class="keluar">&times</a></h2>
        <hr style="border: 1px solid black;margin-top: -3px;">
        <label>Nama Pengguna</label><br>
        <input class="form-control" type="text" name="username" placeholder="Nama Pengguna" /><br>
        

        <input class="form-control" type="hidden" value="yayasan" name="level" placeholder="Level" />
        
        <label>Password</label><br>
        <input class="form-control" type="password" value="Rahasia" name="password" id="pass2" placeholder="Password" /><span toggle="#password-field" class="show-hide"><i class="fas fa-eye toggle-password"></i></span><br>
        <button class="btn btn-primary">Tambah</button>
        @endif
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
        <button class="btn btn-primary">Update</button>
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