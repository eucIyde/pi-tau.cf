<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if($_COOKIE["admin"]!="#") {
    header("Location: index.php");
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
          <li class="nav-item">
            <a class="nav-link" href="register.php">Inscrire un utilisateur</a>
          </li>
        </ul>
      </div>
    </nav>
<centering style='text-align:center;'>
    <br> <br> <br> 
<h1 style='color:red'>Pour supprimer un utlilisateur : aller dans éditer l'utilisateur puis en bas de page.</h1>
<?php 

require('config.php');
//write sql query
$sql = "SELECT * FROM users";

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
  echo '<th>Médaille  </th>';
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['grade']."</td>";
		echo "<td>".$row['role']."</td>";
		echo "<td>".$row['prenom']."</td>";
		echo "<td>".$row['nom']."</td>";
    echo "<td>".$row['medaille']."</td>";
		echo "<td><a href='?edit_user=".$row['username']."'>Éditer l'utilisateur</a>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No records found!";
}

if (!empty($_GET['delete_user']) && $_GET['delete_user']!='admin'){
// Récupérer l'ID de l'utilisateur à supprimer
$user_id = $_GET['delete_user'];

// Supprimer l'utilisateur de la base de données
$sql = 'DELETE FROM users WHERE username = "'.$user_id.'"';

if (mysqli_query($conn, $sql)) {
    echo "Utilisateur supprimé avec succès. ";
    echo "Merci de recharger la page pour appliquer les modifications";
} else {
    echo "Erreur lors de la suppression de l'utilisateur : " . mysqli_error($conn);
    echo $user_id;
}
}

?>
    <hr>

<?php if (isset($_GET['edit_user'])){

$usernam=$_GET["edit_user"];
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
    echo "<th>Médaille  </th>";
    echo "<th>Date de la médaille  </th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['grade']."</td>";
		echo "<td>".$row['role']."</td>";
		echo "<td>".$row['prenom']."</td>";
		echo "<td>".$row['nom']."</td>";
        echo "<td>".$row['medaille']."</td>";
        echo "<td>".$row['date_medaille']."</td>";
		echo "</tr>";
        $username=$row['username'];
        $grade=$row['grade'];
        $prenom=$row['prenom'];
        $nom=$row['nom'];
        $role=$row['role'];
        $medaille=$row['medaille'];
        }
	echo "</table>";
} else {
	echo "No records found!";
}
echo "</div>";

$user=$_GET['edit_user'];
// Connexion à la base de données
if (isset($_POST['username'])){$username = $_POST['username'];}
if (isset($_POST['grade'])){$grade = $_POST['grade'];}
if (isset($_POST['prenom'])){$prenom = $_POST['prenom'];}
if (isset($_POST['nom'])){$nom = $_POST['nom'];}
if (isset($_POST['role'])){$role = $_POST['role'];}
if (isset($_POST['medaille'])){$medaille = $_POST['medaille'];}

// Mettre à jour les données de l'utilisateur dans la base de données
$sql = "UPDATE users SET username = '$username', grade = '$grade', prenom = '$prenom',nom='$nom',role='$role' WHERE username = '$user'";
if (mysqli_query($conn, $sql)) {
if (isset($_POST['username'])){echo "Utilisateur mis à jour avec succès. <br>";echo '<meta http-equiv="Refresh" content="0; url=//pi-tau.cf/pi/redirect.php" />';}
} else {
    echo "Erreur lors de la mise à jour de l'utilisateur : " . mysqli_error($conn);
}

?>

<p> Modifications des informations de <?php echo $_GET['edit_user'];?>
<form action="" method="post">
    <label for="username">Nom d'utilisateur :</label><br>
    <input type="text" name="username" value="<?php echo $username; ?>"><br>
    <label for="grade">Grade :</label><br>
    <input type="number" name="grade"value="<?php echo $grade; ?>"><br>
    <label for="prenom">Prénom :</label><br>
    <input type="text" name="prenom"value="<?php echo $prenom; ?>"><br><br>
    <label for="nom">Nom :</label><br>
    <input type="text" name="nom"value="<?php echo $nom; ?>"><br><br>
    <label for="role">Rôles :</label><br>
    <input type="text" name="role" value="<?php echo $role; ?>"><br><br>
    <input type="submit" value="Mettre à jour" class="btn btn-primary">
</form><br>
<form method='post'>
  <input type='submit' name='medaille' value='Ajouter une médaille' class="btn btn-primary">
</form><br>
<form method='post'>
  <input type='submit' name='medaille2' value='Supprimer une médaille' class="btn btn-primary">
</form><bR>
<form method='post'>
  <input type='text' name='medaille_date' value='<?php echo $dateee;?>' class="btn btn-primary">
  <input type='submit' name='medaille_date2' value='Modifier la date de la médaille' class="btn btn-primary">
</form>
<br>
<div style="display: flex;align-items: center;      justify-content: center; ">
<button class='btn btn-primary' onclick="verifier()" style='display: flex;align-items: center;justify-content: center;'>Supprimer 
l'utilisateur</button>
</div>
<?php }?>

<script> 
function verifier(){
    var result = confirm("Voulez vous vraiment supprimer l'utilisateur <?php echo $username;?>");

    if(result)  {
        document.location.href="http://pi-tau.cf/pi/admin.php?delete_user=<?php echo $username;?>"; 
    }
}
</script>
</centering>
</body>

</html>

<?php
//récucpérer la date en 20081031
$date = date("Ymd");

if (isset($_POST['medaille'])){
  $sql = "UPDATE users SET medaille = '1', date_medaille='$date' WHERE username = '$user'";
  if (mysqli_query($conn, $sql)) {
    echo "Médaille ajoutée avec succès. <br>";
    echo '<meta http-equiv="Refresh" content="0; url=//pi-tau.cf/pi/redirect.php" />';
  } else {
      echo "Erreur lors de la mise à jour de l'utilisateur : " . mysqli_error($conn);
  }
}

if (isset($_POST['medaille2'])){
  $sql = "UPDATE users SET medaille = '0' WHERE username = '$user'";
  if (mysqli_query($conn, $sql)) {
    echo "Médaille supprimée avec succès. <br>";
    echo '<meta http-equiv="Refresh" content="0; url=//pi-tau.cf/pi/redirect.php" />';
  } else {
      echo "Erreur lors de la mise à jour de l'utilisateur : " . mysqli_error($conn);
  }
}
//récupérer la date dans la base
$sql = "SELECT * FROM `users` WHERE username='$usernam'";
$result = mysqli_query($conn, $sql);
$date = mysqli_fetch_assoc($result);
$dateee=$date['date_medaille'];
if (isset($_POST['medaille_date2'])){
  $date=$_POST['medaille_date'];
  $sql = "UPDATE users SET date_medaille = '$date' WHERE username = '$user'";
  if (mysqli_query($conn, $sql)) {
    echo "Date de la médaille modifiée avec succès. <br>";
    echo '<meta http-equiv="Refresh" content="0; url=//pi-tau.cf/pi/redirect.php" />';
  } else {
      echo "Erreur lors de la mise à jour de l'utilisateur : " . mysqli_error($conn);
  }
}
?>