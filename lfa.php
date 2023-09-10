<?php
// Définir l'URL cible
$url = "https://pi-tau.cf/";

// Utiliser pushState pour modifier l'URL de la page sans recharger
echo "<script>window.history.pushState('', '', '$url');</script>";

$nb_visites = file_get_contents('utilisation.txt');
$nb_visites++;
file_put_contents('utilisation.txt', $nb_visites);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Convertisseur de notes ( x/y -> note fr-de + x'/20 + x''/10 )</title>
    <style>
        /* Styles pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Styles pour l'en-tête */
        header {
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        h1 {
            margin: 0;
        }
        
        /* Styles pour le formulaire */
        form {
            margin: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            text-decoration: none;
        }
        
        .button:hover {
            background-color: #3e8e41;
        }
        
        /* Styles pour le résultat */
        #result {
            margin: 20px;
            font-size: 18px;
        }
        
        #retour {
            margin: 20px;
        }
        
        /* Style pour mobile */
        @media screen and (max-width: 1000px) {
            body {
                font-size: 25px;
            }
            
            /* Ajustements pour les éléments spécifiques à la version mobile */
            form {
                margin: 10px;
            }
            
            input[type="text"] {
                padding: 5px;
                font-size: 20px;
            }
            
            button {
                padding: 5px 10px;
                font-size: 20px;
            }
            
            #result {
                margin: 10px;
                font-size: 22px;
            }
            
            #retour {
                margin: 10px;
            }
        }
        
        #i {
            position: fixed;
            top: 0;
            right: 0;
        }
        #supprimer{
            border: none;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        #supprimer:hover{
            background-color: darkred;
        }
        #container{
            margin: 0 auto;
            width: 80%;
        }
        /* si sur pc */
        @media screen and (min-width: 1000px){

        #resultats{
            border: 1px solid black;
            padding: 10px;
            border-radius: 5px;
            position:fixed;
            top: 25%;
            left: 60%;
            transform: translate(-50%, -50%);
            font-size: 3em!important;
        }}
        .spinner {
        margin: auto;
        width: 50px;
        height: 50px;
        border: 10px solid #f3f3f3;
        border-top: 7.5px solid #3498db;
        border-radius: 50%;
        animation: spin 0.5s linear infinite;
        }

        @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }
        @media screen and (max-width: 1000px){
            #resultats{
                position: fixed!important;
                /*fixer en bas de la page IMPORTANT*/
                bottom: 0!important;
                left: 0!important;
                width: 100%!important;
                height: 25%!important;
                background-color: white!important;
                /*premeir plan*/
                z-index:1!important;
                font-size:50px!important;
                border: none!important;
            }
            body{
                font-size: 50px!important;
            }
            input{
                font-size:50px!important;
            }
            button,a{
                font-size:50px!important;
            }
            #i{
                font-size: 25px!important;
            }
            #container{
                width: 100%!important;
            }
            #mobile{
                display: block!important;
            }
            #mobile1{
                display: block!important;
            }
            #mobile2{
                display: block!important;
            }
        }
    #ajouter_note:hover, #ajouter_note_fa:hover{
        text-decoration: none!important;
        color:white!important;
    }
    #note[type="text"]:hover,
    #fanote[type="text"]:hover {
        background-color: #f2f2f2!important;
    }

    /* Afficher le type de note en étant survolé sous forme d'une fenêtre */
    #note[type="text"]:hover::after {
        content: "Note sur 20";
        position: absolute;
        top: 0;
        left: 0;
        background-color: #f2f2f2;
        padding: 5px;
        border-radius: 5px;
        font-size: 15px;
    }

    #fanote[type="text"]:hover::after {
        content: "Note FA";
        position: absolute;
        top: 0;
        left: 0;
        background-color: #f2f2f2;
        padding: 5px;
        border-radius: 5px;
        font-size: 15px;
    }

    </style>
</head>
<body>
    <!-- En-tête -->
    <i id="i">Cet outil a été utilisé <?php echo $nb_visites; ?> fois.</i>
    <header>
        <h1>Convertisseur de notes.</h1>
    </header>
    <div id="container">
    <br>
    
    <!-- Bouton de retour -->
    <button id='retour' class="button">
        Retour
    </button>
    
    <!-- Formulaire -->
    <h2>Note /x:</h2>
    <form onsubmit="convert(); return false;">
        <label for="note">Note sur 20:</label>
        <input type="text" id="note" name="note" placeholder="ex: 15.5/20">
        <button type="submit" id="envoyer" class="button">Envoyer</button>
    </form>
    <h2>Moyennes:</h2>
    <form onsubmit="return calculerMoyenne();" id="form_moyenne" action="#">
        <label for="moyenne">Moyenne:</label>
        <p id="ajout_note"></p>
        <a id="ajouter_note" href="#" class="button" onclick="ajouterNote()">Ajouter une note / x</a><br id="mobile" style="display: none;">
        <a id="ajouter_note_fa" href="#" class="button" onclick="ajouterNoteFa()">Ajouter une note FA</a><br id="mobile1" style="display: none;">
        <button type="submit" id="envoyer_moyenne" class="button">Envoyer</button><br id="mobile" style="display: none;">
    </form>
    <!-- Résultat -->
    <div id="resultats">
        <h2>Résultats:</h2>
        <div id="result">
            Note FA: <span id="note_fa"></span><br>
            Note sur 10: <span id="note_10"></span><br>
            Note sur 20: <span id="note_20"></span><br>
        </div>
    </div>
    </div>
    <div id="mobile2" style="display:none">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    
    <!-- Script -->
    <script>
        // Tableaux des notes et des bornes
        var notes = ['10', '10-', '9+', '9', '9-', '8+', '8', '8-', '7+', '7', '7-', '6+', '6', '6-', '5+', '5', '5-', '4+', '4', '4-', '3+', '3', '3-', '2+', '2', '2-', '1'];
        var bornes = [97, 94, 90, 86, 82, 78, 74, 70, 65, 61, 57, 53, 49, 45, 41, 38, 35, 32, 28, 25, 20, 16, 12, 8, 4, 1];
        var milieu_borne =[99, 95, 91, 87, 83, 79, 75, 71, 66, 62, 58, 54, 50, 46, 42, 39, 36, 33, 29, 26, 21, 17, 13, 9, 5, 2];
        // Fonction de conversion de la note
        function convert() {
            var noteInput = document.getElementById("note").value;
            var notesplit = noteInput.split('/');
            var n_note = parseFloat(notesplit[0]) / parseFloat(notesplit[1]) * 100;
            
            // Recherche de la note correspondante dans le tableau des bornes
            var index = 0;
            while (index < bornes.length && n_note < bornes[index]) {
                index++;
            }
            
            document.getElementById("envoyer").innerHTML = "Envoyer une nouvelle note";
            
            // Affichage de la note correspondante au bout de 1 seconde
            document.getElementById("result").innerHTML = "<div class='spinner'></div>";
            setTimeout(function() {
                document.getElementById("result").innerHTML = "Note GEPI : " + notes[index] + ",<br>Note sur 10: " + (n_note / 10) + " / 10 ,<br>Note sur 20: " + (n_note / 5) + " / 20 .";
            }, 250);
        }
    
        function ajouterNote() {
            var inputNote = document.createElement("input");
            inputNote.type = "text";
            inputNote.name = "note";
            inputNote.className='note';
            inputNote.placeholder = "ex: 15.5/20";
            inputNote.style.margin = "10px";
            
            var btnSupprimer = document.createElement("button");
            btnSupprimer.type = "button";
            btnSupprimer.textContent = "Supprimer";
            btnSupprimer.id="supprimer";
            btnSupprimer.onclick = function() {
                inputNote.parentNode.removeChild(inputNote);
                btnSupprimer.parentNode.removeChild(btnSupprimer);
                br.parentNode.removeChild(br);
            };
            
            var ajoutNote = document.getElementById("ajout_note");
            ajoutNote.appendChild(inputNote);
            ajoutNote.appendChild(btnSupprimer);
            
            var br = document.createElement("br");
            ajoutNote.appendChild(br);
            
            return false;
        }

        function ajouterNoteFa(){
            var inputNote = document.createElement("input");
            inputNote.type = "text";
            inputNote.className="fanote";
            inputNote.name = "fanote";
            inputNote.placeholder = "ex: 9+";
            inputNote.style.margin = "10px";
            
            var btnSupprimer = document.createElement("button");
            btnSupprimer.type = "button";
            btnSupprimer.id="supprimer";
            btnSupprimer.textContent = "Supprimer";
            btnSupprimer.onclick = function() {
                inputNote.parentNode.removeChild(inputNote);
                btnSupprimer.parentNode.removeChild(btnSupprimer);
                br.parentNode.removeChild(br);
            };
            
            var ajoutNote = document.getElementById("ajout_note");
            ajoutNote.appendChild(inputNote);
            ajoutNote.appendChild(btnSupprimer);
            
            var br = document.createElement("br");
            ajoutNote.appendChild(br);
            
            return false;
        }
    function calculerMoyenne() {
        var inputsNotes = document.querySelectorAll('#form_moyenne input[name="note"]');
        var fanotes = document.querySelectorAll('#form_moyenne input[name="fanote"]');
        var totalNotes = inputsNotes.length+fanotes.length;
        var sommeNotes = 0;

        fanotes.forEach(function(fanote) {
            var index = 0;
            while (index < milieu_borne.length && fanote.value != notes[index]) {
                index++;
            }
            sommeNotes += milieu_borne[index]/100;
        });

        // Parcourir tous les inputs de notes
        inputsNotes.forEach(function(inputNote) {
            var noteSplit = inputNote.value.split('/');
            var note = parseFloat(noteSplit[0]) / parseFloat(noteSplit[1]);
            sommeNotes += note;
        });

        // Calculer la moyenne
        var moyenne = sommeNotes / totalNotes;

        // Afficher le résultat
        note_sur_20 = moyenne.toFixed(2)*20;
        note_sur_10 = moyenne.toFixed(2)*10;
        var index = 0;
        while (index < bornes.length &&moyenne*100 < bornes[index]) {
            index++;
        }
        note_lfa=notes[index];
        document.getElementById('result').innerHTML="<div class='spinner'></div>";
        setTimeout(function() {
            document.getElementById('result').innerHTML="Note sur 20 : "+note_sur_20+" / 20 <br> Note sur 10 : "+note_sur_10+" / 10 <br> Note LFA : "+note_lfa;
            if (fanotes.length > 0) {
                document.getElementById('result').innerHTML+="<br><i>Les notes LFA sont prises par leur borne supérieure.</i>";
                document.getElementById('result').innerHTML+="<br><a href='https://cuicui.cf/medias/medias/21Rz5wPbKL4Srv6L0uqeJOGrDiTNQ7AIRl1sTyPXhdJlQeI1KLmZZSzQI4ILmMO6NSUUPm4kAFwXcQksisVS9RBoyBFshnLdTb4f.pdf' target='_blank'>Voir le barème des notes LFA</a>";
            }
        }, 250);
        return false;
    }
    var noteInputs = document.getElementsByClassName('note');
    var fanoteInputs = document.getElementsByClassName('fanote');

    for (var i = 0; i < noteInputs.length; i++) {
      noteInputs[i].addEventListener('mouseover', function() {
        showTooltip(this, 'Note sur 20');
      });
    }

    for (var j = 0; j < fanoteInputs.length; j++) {
      fanoteInputs[j].addEventListener('mouseover', function() {
        showTooltip(this, 'Note FA');
      });
    }

    function showTooltip(input, text) {
      var tooltip = document.createElement('div');
      tooltip.textContent = text;
      tooltip.classList.add('tooltip');
      document.body.appendChild(tooltip);

      var inputRect = input.getBoundingClientRect();
      var tooltipRect = tooltip.getBoundingClientRect();

      tooltip.style.top = (inputRect.top - tooltipRect.height - 5) + 'px';
      tooltip.style.left = inputRect.left + 'px';

      input.addEventListener('mouseout', function() {
        tooltip.parentNode.removeChild(tooltip);
      });
    }
    </script>
</body>
</html>
