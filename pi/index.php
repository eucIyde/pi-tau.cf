<!DOCTYPE html>
<html>
<head>
  <style>
.rbox {
  border: 1px solid #c4c4c4;
  border-radius: 10px;
  padding: 30px 25px 10px 25px;
  background: white;
  margin: 30px auto;
}
h1.rbox-logo a {
  text-decoration:none;
}
h1.rbox-title {
  color: #AEAEAE;
  background: #f8f8f8;
  font-weight: 300;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  text-align:center;
  margin: -27px -26px 26px;
}
.rbox-button {
  border-radius: 5px;
  background: #d2483c;
  text-align: center;
  cursor: pointer;
  font-size: 19px;
  width: 100%;
  height: 51px;
  padding: 0;
  color: #fff;
  border: 0;
  outline:0;
}
.rbox-register
{
  text-align:center;
  margin-bottom:0px;
}
.rbox-register a
{
  text-decoration:none;
  font-size:12px;
  color:#666;
}
.rbox-input {
  font-size: 14px;
  background: #fff;
  border: 1px solid #ddd;
  margin-bottom: 25px;
  padding-left:10px;
  border-radius: 5px;
  width: 100%;
  height: 50px;
}
.rbox-input:focus {
    outline: none;
    border-color:#5c7186;
}
.sucess{
  text-align: center;
  color: white;
}
.sucess a {
  text-decoration: none;
  color: #58aef7;
}
p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
@media (max-width: 1000px) {
  .rbox {
    width: 90%!important;
    height: auto!important;
  }
  .rbox-logo {
    width: 100%!important;
  }
  .rbox-title {
    width: 100%!important;
    font-size: 40px!important;
  }
  .rbox-input {
    width: 100%!important;
    font-size: 40px!important;
  }
  .rbox-button {
    width: 75%!important;
    text-align: center!important;
    align-items: center!important;
    /*centrer*/
    margin-left: auto!important;
    margin-right: auto!important;
    
    font-size: 40px!important;
  }

}
@media (max-width: 400px) {
  .rbox {
    width: 100%!important;
  }
}
</style>
  <title>Pi-tau</title>
</head>
<body>

<form class="rbox" action="" method="post" name="login" onsubmit="soumis()">
<h1 class="rbox-logo rbox-title"><a href="http://pi-tau.cf">Pi-tau</a></h1>
<h1 class="rbox-title">Connexion</h1>
<input type="text" class="rbox-input" name="username" id="username" placeholder="Nom d'utilisateur"><br>
<input type="password" class="rbox-input" name="password" id="password" placeholder="Mot de passe">
<div id="test"></div>
<button type="button" onclick="soumis()" class="rbox-button">Connexion</button>
</form>

<script>
  function soumis(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var request = new XMLHttpRequest();
    request.open('GET', 'pi/verif.php?username=' + username + '&password=' + password, true);

    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {
        var response = request.responseText;
        document.getElementById('test').innerHTML = response;
      } else {
        console.error('Une erreur s\'est produite lors du chargement du contenu.');
      }
    };

    request.onerror = function() {
      console.error('Une erreur s\'est produite lors de la requête.');
    };

    request.send();
  }
</script>

</body>
</html>
