
<style>
.a-primary{
    border:15px solid #007bff;
    border-radius:10px;
    background-color:#007bff;
    color:white;
    text-decoration:none;
    margin:10px;
    padding:10px;
    /*ajouter des espaces autour */
    display:inline-block;
    
}
.a-primary:hover{
    background-color:blue;
    border-color: blue;
    transition: 2s;
}
#container{
    width:85%;
    position: fixed;
    left:5%;
    right:5%;
}
#back{
    position:fixed;
    top:10;
    left:10;
}
#path{
    font-size:1.5em !important;
}
</style>
<a href="/" id="back" class="a-primary">🔙</a>
<div id="container">
<br>
<div style="display:inline" id='path'><a href='/'>Pi-tau</a>><a href="#">Code</a></div>
<br><br>
<h1 style='text-align:center'> Codes </h1>
<li> <a href="générer_phrases.php" class="a-primary"> Générer des phrases ( python )</a> </li>
<li> <a href="random.php" class="a-primary"> Générer des choix aléatoires ( php )</a> </li>
</div>