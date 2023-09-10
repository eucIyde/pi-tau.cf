<?php
// Définir l'URL cible
$url = "https://pi-tau.cf/";

// Utiliser pushState pour modifier l'URL de la page sans recharger
echo "<script>window.history.pushState('', '', '$url');</script>";

?>
<div id="accueil">
<html lang="fr">
  <head>
    <!-- Charger Bootstrap via CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Site de pi</title>
    <meta charset="utf8">
<link rel="shortcut icon" href="https://www.biocod.universite-paris-saclay.fr/modifier/medias/t8ZMck9ZLZaXDNBEI4JoC4nnua9bZRwB0zF4co3Cl4cziLnNp103b51IS9IzSgyzzcP1pWPZFEhzcWhARPaZjMC6dYfmMSpbaM9t.png" type="image/x-icon">
  </head>
  <body>
    <!-- Créer un header en utilisant la classe navbar de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="http://pi-tau.cf/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg> Site de pi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" id='topi' href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-lock" viewBox="0 0 16 16">
  <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
  <path d="M10 13a1 1 0 0 1 1-1v-1a2 2 0 0 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
</svg> Pi</a></li>
        <li class="nav-item"><a class="nav-link" href="#" id="convertisseur-go"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-input-cursor-text" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 2a.5.5 0 0 1 .5-.5c.862 0 1.573.287 2.06.566.174.099.321.198.44.286.119-.088.266-.187.44-.286A4.165 4.165 0 0 1 10.5 1.5a.5.5 0 0 1 0 1c-.638 0-1.177.213-1.564.434a3.49 3.49 0 0 0-.436.294V7.5H9a.5.5 0 0 1 0 1h-.5v4.272c.1.08.248.187.436.294.387.221.926.434 1.564.434a.5.5 0 0 1 0 1 4.165 4.165 0 0 1-2.06-.566A4.561 4.561 0 0 1 8 13.65a4.561 4.561 0 0 1-.44.285 4.165 4.165 0 0 1-2.06.566.5.5 0 0 1 0-1c.638 0 1.177-.213 1.564-.434.188-.107.335-.214.436-.294V8.5H7a.5.5 0 0 1 0-1h.5V3.228a3.49 3.49 0 0 0-.436-.294A3.166 3.166 0 0 0 5.5 2.5.5.5 0 0 1 5 2z"/>
  <path d="M10 5h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-4v1h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-4v1zM6 5V4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v-1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4z"/>
</svg> Convertisseur de notes</a></li>
        <li class="nav-item"><a class="nav-link" href="/code/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
  <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
</svg> Code</a></li>
          <li class="nav-item"> <a class="nav-link" href="/alkindi">ALKINDI</a></li>
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/troisieme/allemand/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"></path>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"></path>
</svg>
  Education

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#" id="goto_learnpi">Apprendre pi - avec les boutons</a>
          <a class="dropdown-item" href="#" id="goto_learntau">Apprendre tau - avec les boutons</a>
          <a class="dropdown-item" href="#" id="goto_pi_clavier">Apprendre pi - avec le clavier</a>
          <a class="dropdown-item" href="#" id="goto_tau_clavier">Apprendre tau - avec le clavier</a>        </div>
      </li>
      </ul>
      </div>
    </nav>
    
<style>
body {
  background-color: #f8f9fa;
}
#signature {
  position:fixed;
  font-size: 2em;
  font-family: "Times New Roman", Times, serif;
  bottom: 10;
  right: 10;
  text-decoration: italic;
}
#signature:hover{
  font-size: 2em;
  font-family: "Times New Roman", Times, serif;
  color: #007bff;
  text-decoration: bold;
} 
/* Mettre la première partie à droite et la seconde à gauche à la même auteur pas l'un au dessus de l'autre */
#poeme1 {
  font-size: 1.5em;
  font-family: "Times New Roman", Times, serif;
  float: left;
  width: 50%;
  padding: 10px;

}
#poeme2 {
  font-size: 1.5em;
  font-family: "Times New Roman", Times, serif;
  float: right;
  width: 50%;
  padding: 10px;
}
@media screen and (max-width: 1000px) {
  #poeme1, #poeme2 {
    width: 100%;
  }
  #signature {
    display:none!important;
  }
  #cont {
    width: 100%!important;
    max-width: 100%!important;
  }
  #title{
    font-size: 2em!important;
  }
}
#poeme1:hover{
  font-size: 1.5em;
  font-family: "Times New Roman", Times, serif;
  float: left;
  width: 50%;
  padding: 10px;
  color: #007bff;
}
#poeme2:hover{
  font-size: 1.5em;
  font-family: "Times New Roman", Times, serif;
  float: right;
  width: 50%;
  padding: 10px;
  color: #007bff;
}

</style>

    <!-- Créer le contenu de la page -->
    <div class="container mt-5" id='cont'>
          <h1 class="text-center" id='title'>PI - TAU</h1>
          <?php if ($_GET['old']==0 || $_GET['old']>1){?>
          <div id="poeme1">
            Le symbole de Pi est très énigmatique; <br>
            Ses actions peuvent sembler  ésotérique;<br>
            Mais  il libère l’homme en réalité<br>
            <br>
            L’Homme soumis à son corps et ses passions<br>
            Ne peut se délivrer qu’en cherchant la vérité<br>
            Il la trouve  dans la science ou  la beauté <br>
            Toutes deux sont des œuvres de contemplations.<br>
            <br>
            comprendre Pi, c’est comprendre les mathématiques.<br>
            Or les sciences, ne peuvent  sans les mathématiques <br>
            se comprendre, sans pi aucune libération.<br>
            <br>
          </div>
            <div id="poeme2">
            Pour la beauté, il faut contempler la vérité,<br>
            La vérité divine, est la lumière, éblouissant <br>
            l’âme, et n’est accessible qu’en se détachant<br>
            des réalités matérielles, en cherchant le divin.<br>
            <br>
            Mais comment se détacher, se libérer,<br>
            sans connaître la corde qui nous lie?<br>
            tel la rivière qui ne peut sortir de son lit<br>
            sans déborder, l’homme ne peut se libérer,<br>
            Sans excès de science. La science est à partager.<br>
            Le partage conduit à l’amour, le but de chaque vie<br>
            par Pi, l’homme trouve son Dieu et l’Amour, <br>
            et  sauve ainsi sa vie.<br>
          </div>
            <br>
          <div id="signature">
            <p>- Le grand œuil pour pi : 04/2023</p>
          </div>
          <?php if ($_GET['old']==0){?>
            
          <?php } ?>
          <?php } ?>
		<div>
        </form> <br/>
		</div>
  </div>
  <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>

</div>
<div id="convertisseur" style="display:none">
    <?php require_once('lfa.php'); ?>
</div>
<div id="pi_clavier" style="display:none">
   <?php require_once('pigame/clavier.html'); ?>
</div>
<div id="tau_clavier" style="display:none">
   <?php require_once('taugame/clavier.html'); ?>
</div>
<div id="learn_pi" style="display:none">
   <?php require_once('pigame/index.html'); ?>
</div>
<div id="learn_tau" style="display:none">
   <?php require_once('taugame/index.html'); ?>
</div>
<div id='pi_connexion' style="display:none">
  <?php require_once('pi/index.php'); ?>
</div>


<script>
  accueil = document.getElementById("accueil");
  convertisseur = document.getElementById("convertisseur");
  pi_clavier = document.getElementById("pi_clavier");
  tau_clavier = document.getElementById("tau_clavier");
  learn_pi = document.getElementById("learn_pi");
  learn_tau = document.getElementById("learn_tau");
  goto_learnpi=document.getElementById("goto_learnpi");
  goto_learntau=document.getElementById("goto_learntau");
  goto_pi_clavier=document.getElementById("goto_pi_clavier");
  goto_tau_clavier=document.getElementById("goto_tau_clavier");
  retour = document.getElementById("retour");
  convertisseur_go = document.getElementById("convertisseur-go");
  convertisseur_go.addEventListener("click", function(){
    accueil.style.display = "none";
    setTimeout(function() {
    convertisseur.style.display = "block";
    }, 250);
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  goto_learnpi.addEventListener("click", function(){
    accueil.style.display = "none";
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    setTimeout(function() {
    learn_pi.style.display = "block";
    }, 250);
    learn_tau.style.display = "none";
  });
  goto_learntau.addEventListener("click", function(){
    accueil.style.display = "none";
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    setTimeout(function() {
    learn_tau.style.display = "block";
    }, 250);
  });
  goto_pi_clavier.addEventListener("click", function(){
    accueil.style.display = "none";
    convertisseur.style.display = "none";
    setTimeout(function() {
    pi_clavier.style.display = "block";
    }, 250);
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  goto_tau_clavier.addEventListener("click", function(){
    accueil.style.display = "none";
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    setTimeout(function() {
    tau_clavier.style.display = "block";
    }, 250);
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  // il y a 5 bouttons de retours
  retour.addEventListener("click", function(){
    setTimeout(function() {
    accueil.style.display = "block";
    }, 250);
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  retour1.addEventListener("click", function(){
    setTimeout(function() {
    accueil.style.display = "block";
    }, 250);
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  retour2.addEventListener("click", function(){
    setTimeout(function() {
    accueil.style.display = "block";
    }, 250);
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  retour3.addEventListener("click", function(){
    setTimeout(function() {
    accueil.style.display = "block";
    }, 250);
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  retour4.addEventListener("click", function(){
    setTimeout(function() {
    accueil.style.display = "block";
    }, 250);
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
  var topi=document.getElementById("topi");
  var pi_connexion=document.getElementById("pi_connexion");
  topi.addEventListener("click", function(){
    setTimeout(function() {
    pi_connexion.style.display = "block";
    }, 250);
    accueil.style.display = "none";
    convertisseur.style.display = "none";
    pi_clavier.style.display = "none";
    tau_clavier.style.display = "none";
    learn_pi.style.display = "none";
    learn_tau.style.display = "none";
  });
</script>
<style>
@media (max-width: 600px) {
  .rbox {
    width: 90%!important;
  }
}
@media (max-width: 400px) {
  .rbox {
    width: 100%!important;
  }
}
@media (min-width:600px) {
  .rbox {
    width: 40%!important;
  }
}
</style>