<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  #vérfication de la connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Pi</title>
        <meta charset="UTF-8">
        <meta name="description" content="Ce site internet permet de commander en ligne des sweats et t-shirts saisonniers du lfa.">    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="">site de pi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        </ul>
      </div>
    </nav>
<centering style='text-align:center;'>
    <br> <br> <br> 

<?php 

require('config.php');
//write sql query
$session=$_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$session'";

//execute query
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr>";
	echo "<th>Username  </th>";
	echo "<th>Grade  </th>";
	echo "<th>Rôles  </th>";
    echo "<th>Prénom  </th>";
    echo "<th>Nom  </th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['grade']."</td>";
		echo "<td>".$row['role']."</td>";
		echo "<td>".$row['prenom']."</td>";
		echo "<td>".$row['nom']."</td>";
		echo "<td><a href='?edit_user=".$row['username']."'>Éditer votre profil</a>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No records found!";
}

?>
<?php if ($_GET['edit_user']==$_SESSION['username']){

$usernam=$_SESSION['username'];
$sql = "SELECT * FROM `users` WHERE username='$usernam'";

//execute query
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr>";
	echo "<th>Username  </th>";
	echo "<th>Grade  </th>";
	echo "<th>Rôles  </th>";
    echo "<th>Prénom  </th>";
    echo "<th>Nom  </th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['grade']."</td>";
		echo "<td>".$row['role']."</td>";
		echo "<td>".$row['prenom']."</td>";
		echo "<td>".$row['nom']."</td>";
		echo "</tr>";
        $username=$row['username'];
        $grade=$row['grade'];
        $prenom=$row['prenom'];
        $nom=$row['nom'];
        $role=$row['role'];
        }
	echo "</table>";
} else {
	echo "No records found!";
}
echo "</div>";

$user=$_GET['edit_user'];
// Connexion à la base de données
if (isset($_POST['username'])){$username = $_POST['username'];}
if (isset($_POST['prenom'])){$prenom = $_POST['prenom'];}
if (isset($_POST['nom'])){$nom = $_POST['nom'];}

// Mettre à jour les données de l'utilisateur dans la base de données
$sql = "UPDATE users SET username = '$username', prenom = '$prenom',nom='$nom' WHERE username = '$user'";
if (mysqli_query($conn, $sql)) {
    echo "Utilisateur mis à jour avec succès.";
    if (isset($_POST['username'])){echo '<meta http-equiv="Refresh" content="0; url=//pi-tau.cf/pi/accueil.php" />';}
} else {
    echo "Erreur lors de la mise à jour de l'utilisateur : " . mysqli_error($conn);
}

?>
<p> Modifications des informations de <?php echo $_GET['edit_user'];?>
<form action="" method="post">
    <label for="username">Nom d'utilisateur :</label><br>
    <input type="text" name="username" value="<?php echo $username; ?>"><br>
    <label for="prenom">Prénom :</label><br>
    <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br><br>
    <label for="nom">Nom :</label><br>
    <input type="text" name="nom" value="<?php echo $nom; ?>"><br><br>
    <input type="submit" value="Mettre à jour" class="btn btn-primary">
</form>
<?php }?>

<!-- <h2> Revendication </h2>
<?php 
mysql_close();
// Informations d'identification
define('DB_SERVER', '#');
define('DB_USERNAME', '#');
define('DB_PASSWORD', '#');
define('DB_NAME', '#');
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){
    echo("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
$usernam=$_SESSION['username'];
$sql = "SELECT * FROM `texte` WHERE personne='$usernam'";
echo $sql;

//execute query
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr>";
	echo "<th>Username  </th>";
	echo "<th>Revendication  </th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['personne']."</td>";
		echo "<td>".$row['text']."</td>";
		echo "<td><a href='admin.php?delete_texte=".$row['text']."'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No records found!";
}
if (!empty($_GET['delete_texte'])){
// Récupérer l'ID de l'utilisateur à supprimer
$user_id = $_GET['delete_texte'];

// Supprimer l'utilisateur de la base de données
$sql = 'DELETE FROM texte WHERE text = "'.$user_id.'"';

if (mysqli_query($conn, $sql)) {
    echo "Révendication supprimée avec succès. ";
    echo "Merci de recharger la page pour appliquer les modifications";
} else {
    echo "Erreur lors de la suppression : " . mysqli_error($conn);
    echo $user_id;
}
}


if (isset($_REQUEST['personne'], $_REQUEST['texte'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $personne = stripslashes($_REQUEST['personne']);
  $personne = mysqli_real_escape_string($conn, $personne); 

  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 

  $texte = stripslashes($_REQUEST['texte']);
  $texte = mysqli_real_escape_string($conn, $texte); 
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `texte` (personne,texte)
              VALUES ('$personne','$texte')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
Revendication faite avec succès, <strong>merci de ne pas recharger la page</strong>
       </div>";
    }}
    else{?>
<form class="box" action="" method="post">
    <h1 class="box-title">Revendication</h1>
    <input type="text" class="box-input" name="texte" placeholder="texte" required />
    <input type="submit" name="submit" value="Soumettre" class="box-button" />
</form>
<?php } ?>-->
</centering>
</body>

</html>