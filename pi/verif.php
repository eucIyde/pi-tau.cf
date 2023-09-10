<?php
require('config.php');
session_start();
if (isset($_GET['username'])){
  $username = stripslashes($_GET['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_GET['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      if($_GET['password']=="#")
      {
         setcookie("admin","#");
         echo '<meta http-equiv="refresh" content="0; URL=pi/admin.php">';
      }
      else{
      echo '<meta http-equiv="refresh" content="0; URL=pi/accueil.php">';
    }
  }
  else{
    echo "<p class='errorMessage'>Le nom d'utilisateur ou le mot de passe est incorrect.</p>";
  }
}
?>