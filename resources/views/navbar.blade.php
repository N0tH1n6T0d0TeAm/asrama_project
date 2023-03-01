<!--

                                        ,   ,                                
                                        $,  $,     ,                         
                                        "ss.$ss. .s'                         
                                ,     .ss$$$$$$$$$$s,                        
                                $. s$$$$$$$$$$$$$$`$$Ss                      
                                "$$$$$$$$$$$$$$$$$$o$$$       ,              
                               s$$$$$$$$$$$$$$$$$$$$$$$$s,  ,s               
                              s$$$$$$$$$"$$$$$$""""$$$$$$"$$$$$,             
                              s$$$$$$$$$$s""$$$$ssssss"$$$$$$$$"             
                             s$$$$$$$$$$'         `"""ss"$"$s""              
                             s$$$$$$$$$$,              `"""""$  .s$$s        
                             s$$$$$$$$$$$$s,...               `s$$'  `       
                         `ssss$$$$$$$$$$$$$$$$$$$$####s.     .$$"$.   , s-   
                           `""""$$$$$$$$$$$$$$$$$$$$#####$$$$$$"     $.$'    
 Dibuat Oleh:                 ```"$$$$$$$$$$$$$$$$$$$$$####s""     .$$$|     
   - Michael Patrick               "$$$$$$$$$$$$$$$$$$$$$$$$##s    .$$" $    
                                   $$""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"   `    
                                  $$"  "$"$$$$$$$$$$$$$$$$$$$$S""""'         
                             ,   ,"     '  $$$$$$$$$$$$$$$$####s             
                             $.          .s$$$$$$$$$$$$$$$$$####"            
                 ,           "$s.   ..ssS$$$$$$$$$$$$$$$$$$$####"            
                 $           .$$$S$$$$$$$$$$$$$$$$$$$$$$$$#####"             
                 Ss     ..sS$$$$$$$$$$$$$$$$$$$$$$$$$$$######""              
                  "$$sS$$$$$$$$$$$$$$$$$$$$$$$$$$$########"                  
           ,      s$$$$$$$$$$$$$$$$$$$$$$$$#########""'                      
           $    s$$$$$$$$$$$$$$$$$$$$$#######""'      s'         ,           
           $$..$$$$$$$$$$$$$$$$$$######"'       ....,$$....    ,$            
            "$$$$$$$$$$$$$$$######"' ,     .sS$$$$$$$$$$$$$$$$s$$            
              $$$$$$$$$$$$#####"     $, .s$$$$$$$$$$$$$$$$$$$$$$$$s.         
   )          $$$$$$$$$$$#####'      `$$$$$$$$$###########$$$$$$$$$$$.       
  ((          $$$$$$$$$$$#####       $$$$$$$$###"       "####$$$$$$$$$$      
  ) \         $$$$$$$$$$$$####.     $$$$$$###"             "###$$$$$$$$$   s'
 (   )        $$$$$$$$$$$$$####.   $$$$$###"                ####$$$$$$$$s$$' 
 )  ( (       $$"$$$$$$$$$$$#####.$$$$$###'                .###$$$$$$$$$$"   
 (  )  )   _,$"   $$$$$$$$$$$$######.$$##'                .###$$$$$$$$$$     
 ) (  ( \.         "$$$$$$$$$$$$$#######,,,.          ..####$$$$$$$$$$$"     
(   )$ )  )        ,$$$$$$$$$$$$$$$$$$####################$$$$$$$$$$$"       
(   ($$  ( \     _sS"  `"$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$S$$,       
 )  )$$$s ) )  .      .   `$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"'  `$$      
  (   $$$Ss/  .$,    .$,,s$$$$$$##S$$$$$$$$$$$$$$$$$$$$$$$$S""        '      
    \)_$$$$$$$$$$$$$$$$$$$$$$$##"  $$        `$$.        `$$.                
        `"S$$$$$$$$$$$$$$$$$#"      $          `$          `$                
            `"""""""""""""'         '           '           '


-->


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        font-family: 'Josefin Sans',sans-serif;
    }
    body{
        background: #f3f5f9;
    }
    .wrapper{
        display: flex;
        position: relative;
    }
    .wrapper .sidebar{
        position: fixed;
        width: 200px;
        height: 100%;
        background:#4b4276;
        padding: 30px 0;
    }
    .wrapper .sidebar h2{
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }
    .wrapper .sidebar ul li{
        padding: 15px;
        border-bottom: 1px solid rgba(0,0,0,0.5);
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .wrapper .sidebar ul li a{
        color: #bdb8d7;
        display: block;
    }
    .wrapper .sidebar ul li a .fas{
        width: 25px;
    }
    .wrapper .sidebar ul li a .fa{
        width: 25px;
    }
    .wrapper .sidebar ul li:hover{
        background: #594f8d;
        cursor: pointer;
    }
    .wrapper .sidebar ul li:hover{
        color: #fff;
    }
    .wrapper .main-content{
        width: 100%;
        margin-left: 200px;
    }
    .wrapper .main-content .header{
        padding: 20px;
        background: #fff;
        color: #717171;
        border-bottom: 1px solid #e0e4e8;
    }
    .wrapper .main-content .info{
        margin: 20px;
    }
</style>
<div class="wrapper">
    <div class="sidebar">
        <h2 style="font-size: 20px;">DormNote</h2>
        <ul>
            <li><a href="/home"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="/pengguna"><i class="fas fa-user"></i>Pengguna</a></li>
            <li><a href="/catatan_publik/"><i class="fa fa-pencil-square"></i>Catatan Publik</a></li>
            <li><a href="/status_tidak_aktif/"><i class="fa fa-arrow-down"></i>Status Tidak Aktif</a></li><br><br><br><br><br><br><br><br>
            <li><a href="/logout"><i class="fas fa-chevron-circle-left"></i>Log Out</a></li>
        </ul>
    </div>
    <div class="main-content">
    <div class="header">Selamat Datang {{auth()->user()->username}} !</div>
    <div class="info">
        <div>@yield('konten')</div>
    </div>
    </div>
</div>