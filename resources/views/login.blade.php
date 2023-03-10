<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
body {
  background: url('https://wallpaperaccess.com/full/378016.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  font-family: 'Open Sans', sans-serif;
  line-height: 1.6;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0;
  padding: 0;
}

h1 {
  margin-top: 48px;
}

form {
  background: #fff6;
  max-width: 360px;
  width: 100%;
  padding: 58px 44px;
  border: 1px solid ##e1e2f0;
  border-radius: 4px;
  box-shadow: 0 0 5px 0 rgba(42, 45, 48, 0.12);
  transition: all 0.3s ease;
}

.row {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.row label {
  font-size: 13px;
  color: black;
}

.row input {
  flex: 1;
  padding: 13px;
  border: 1px solid #d6d8e6;
  border-radius: 4px;
  font-size: 16px;
  transition: all 0.2s ease-out;
}

.row input:focus {
  outline: none;
  box-shadow: inset 2px 2px 5px 0 rgba(42, 45, 48, 0.12);
}

.row input::placeholder {
  color: #C8CDDF;
}

button {
  width: 100%;
  padding: 12px;
  font-size: 18px;
  background: #15C39A;
  color: #fff;
  border: none;
  border-radius: 100px;
  cursor: pointer;
  font-family: 'Open Sans', sans-serif;
  margin-top: 15px;
  transition: background 0.2s ease-out;
}

button:hover {
  background: #55D3AC;
}

@media(max-width: 500px) {
  
  body {
    margin: 0 18px;
  }
  
  form {
    border: none;
    box-shadow: none;
    padding: 20px 0;
  }

  form .row{
    padding: 10px;
  }
  button{
    width: 70%;
    margin-left: 2em;
  }

}
</style>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<h1>Login</h1>
<form action="/postLogin" method="POST">
    @csrf
    <div class="row" style="text-align: center">
    {{@session('error')}}
    </div>
    
  <div class="row">
    <label for="username">Username</label>
    <input type="username" name="username" placeholder="username">
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="password">
  </div>
  <button type="submit">Login</button><br><br>
</form>