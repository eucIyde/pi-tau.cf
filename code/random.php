<?php
$nb_visites = file_get_contents('utilisation.txt');
$nb_visites++;
file_put_contents('utilisation.txt', $nb_visites);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Random</title>
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
        <h1>Choix random</h1>
    </header>
    <div id="container">
    <br>
    
    <!-- Bouton de retour -->
    <a id='retour' class='button' href='index.php'>Retour</a>
    
    <h2>Choix:</h2>
    <form onsubmit="return calculerMoyenne();" id="form_moyenne" action="#">
        <label for="moyenne">Choix:</label>
        <p id="ajout_note"></p>
        <a id="ajouter_note" href="#" class="button" onclick="ajouterNote()">Ajouter un choix</a><br id="mobile" style="display: none;">
        <button onclick="calculerMoyenne()" id="envoyer_moyenne" class="button">Envoyer</button><br id="mobile" style="display: none;">
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
// Chercher dans l'URL s'il y a des choix
var url = new URL(window.location.href);
var choix = url.searchParams.get("choix");
var choix_array = choix ? choix.split(",") : [];

// Afficher les choix dans le formulaire
for (var i = 0; i < choix_array.length; i++) {
    var divChoix = document.createElement("div");
    divChoix.className = 'choix-container';

    var inputNote = document.createElement("input");
    inputNote.type = "text";
    inputNote.name = "note";
    inputNote.className = 'choix';
    inputNote.placeholder = "Choix";
    inputNote.style.margin = "10px";
    inputNote.value = choix_array[i];

    var btnSupprimer = document.createElement("button");
    btnSupprimer.type = "button";
    btnSupprimer.textContent = "Supprimer";
    btnSupprimer.id = "supprimer";
    btnSupprimer.onclick = supprimerChoixURL.bind(null, inputNote.value);

    divChoix.appendChild(inputNote);
    divChoix.appendChild(btnSupprimer);

    var ajoutNote = document.getElementById("ajout_note");
    ajoutNote.appendChild(divChoix);
}

function ajouterNote() {
    var divChoix = document.createElement("div");
    divChoix.className = 'choix-container';

    var inputNote = document.createElement("input");
    inputNote.type = "text";
    inputNote.name = "note";
    inputNote.className = 'choix';
    inputNote.placeholder = "Choix";
    inputNote.style.margin = "10px";

    var btnSupprimer = document.createElement("button");
    btnSupprimer.type = "button";
    btnSupprimer.textContent = "Supprimer";
    btnSupprimer.id = "supprimer";
    btnSupprimer.onclick = function () {
        divChoix.parentNode.removeChild(divChoix);
    };

    divChoix.appendChild(inputNote);
    divChoix.appendChild(btnSupprimer);

    var ajoutNote = document.getElementById("ajout_note");
    ajoutNote.appendChild(divChoix);

    return false;
}

function calculerMoyenne() {
    var choix = document.querySelectorAll('#form_moyenne input[name="note"]');
    var choix_url = "";
    for (var i = 0; i < choix.length; i++) {
        choix_url += choix[i].value + ",";
    }
    history.pushState(null, null, "?choix=" + choix_url);

    var choices = document.querySelectorAll('#form_moyenne input[name="note"]');
    var random = Math.floor(Math.random() * choices.length);
    var choice = choices[random];

    document.getElementById("result").innerHTML = "<div class='spinner'></div>";
    setTimeout(function () {
        document.getElementById("result").innerHTML = "Choix: " + choice.value;
    }, 250);
    return false;
}

function supprimerChoixURL(choix) {
    var url = new URL(window.location.href);
    var choixParams = url.searchParams.get("choix");
    var choixArray = choixParams ? choixParams.split(",") : [];

    var index = choixArray.indexOf(choix);
    if (index > -1) {
        choixArray.splice(index, 1);
        var newParams = choixArray.join(",");
        history.replaceState(null, null, "?choix=" + newParams);

        // Supprimer le choix de l'affichage sur la page
        var inputsChoix = document.querySelectorAll('.choix');
        for (var i = 0; i < inputsChoix.length; i++) {
            if (inputsChoix[i].value === choix) {
                var parentElement = inputsChoix[i].parentNode;
                parentElement.removeChild(inputsChoix[i]);
                if (parentElement.lastChild.nodeName === "BUTTON") {
                    parentElement.removeChild(parentElement.lastChild);
                }
                break;
            }
        }
    }
}




    </script>
</body>
</html>
