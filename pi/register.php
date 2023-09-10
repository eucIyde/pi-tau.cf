<?php
if ($_COOKIE["admin"]!="#"){header("Location :index.php");}?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['grade'], $_REQUEST['password'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['role'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 

  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 

  $prenom = stripslashes($_REQUEST['prenom']);
  $prenom = mysqli_real_escape_string($conn, $prenom); 

  $role = stripslashes($_REQUEST['role']);
  $role = mysqli_real_escape_string($conn, $role); 
  // récupérer l'grade et supprimer les antislashes ajoutés par le formulaire
  $grade = stripslashes($_REQUEST['grade']);
  $grade = mysqli_real_escape_string($conn, $grade);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, nom,prenom,grade,role,password)
              VALUES ('$username','$prenom','$nom', '$grade','$role', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
Personne inscrite avec succès, <strong>merci de ne pas recharger la page</strong> : pour retourner à la page d'accueil : <a href='admin.php'>lien</a>
       </div>";
    }}
else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a href="premieres-lfa.ga">pi</a></h1>
    <h1 class="box-title">Inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="number" class="box-input" name="grade" placeholder="grade" required />
    <input type="text" class="box-input" name="nom" placeholder="Prénom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Nom" required />
    <p>Séparer les roles avec un ';'</p>
    <input type="text" class="box-input" name="role" placeholder="roles" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" id="password">
    <input type="checkbox" name="showPassword" id="showPassword" onchange="showHidePassword()" >afficher le mot de passe</input></p>
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="index.php">Connectez-vous ici</a></p>
</form>
<script>
function showHidePassword(){
var passwordInput = document.getElementById("password");
if(passwordInput.type == "password"){
    passwordInput.type = "text";
} else {
    passwordInput.type = "password";
}
}
</script>
<?php } ?>
</body>
</html>