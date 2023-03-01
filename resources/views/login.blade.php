<style>
    body{
        background: url('https://wallpaperaccess.com/full/378016.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        font-family: 'popins',sans-serif;
    }
    .form-login{
        margin-left: 22em;
        margin-top: 8em;
        text-align: center;
        background: rgba(255,255,255,0.5);
        width: 40%;
        height: 15em;
    }
    .form-login input{
        width: 30em;
        height: 2.5em;
        outline: none;
        border-radius: 4px;
        border: none;
    }
    input[placeholder]:focus{
        border: 2px solid black;
    }
    .form-login button{
        width: 70%;
        height: 15%;
        background: rgba(255,255,255,0);
        cursor: pointer;
    }
    button:hover{
        background: #fff;
        transition: 0.3s;
    }
</style>

<div class="form-login">
<form action="postLogin" method="POST">
@csrf
<br><br>
<b>Login Sekarang!</b><br><br>
<input type="text" name="username"  placeholder="Username" /><br><br>
<input type="password" name="password" placeholder="Password" /><br><br>
<button>Login</button>
</div>
</form>