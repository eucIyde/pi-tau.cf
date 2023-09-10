<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if($_COOKIE["admin"]!="#") {
    header("Location: index.php");
    exit(); 
  }
?><!DOCTYPE html>
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
          <li class="nav-item">
            <a class="nav-link" href="register.php">Inscrire un utilisateur</a>
          </li>
        </ul>
      </div>
    </nav>
<centering style='text-align:center;'>

<h2> Revendications </h2>
<?php 

// Informations d'identification
#
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
//write sql query
$sql = "SELECT * FROM `texte`";

//execute query
$result = mysqli_query($conn, $sql);

echo $result;

if(mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr>";
	echo "<th>Username  </th>";
	echo "<th>Revendication  </th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['personne']."</td>";
		echo "<td>".$row['texte']."</td>";
		echo "<td><a href='admin.php?delete_texte=".$row['texte']."'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No records found!";
}
if (isset($_GET['delete_texte'])){
// Récupérer l'ID de l'utilisateur à supprimer
$user_id = $_GET['delete_texte'];

// Supprimer l'utilisateur de la base de données
$sql = 'DELETE FROM texte WHERE texte = "'.$user_id.'"';

if (mysqli_query($conn, $sql)) {
    echo "Révendication supprimée avec succès. ";
    echo "Merci de recharger la page pour appliquer les modifications";
} else {
    echo "Erreur lors de la suppression de l'utilisateur : " . mysqli_error($conn);
    echo $user_id;
}
}

?>
</centering>
</body>

</html>