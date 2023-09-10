<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/k0lxkqlsjo6r021biiv7tri11ucdcfsr8glga96j1o0i2fc2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

<style>
.a-primary{
    border:15px solid #007bff;
    border-radius:10px;
    background-color:#007bff;
    color:white;
    text-decoration:none;
}
.a-primary:hover{
    background-color:blue;
    border-color: blue;
    transition: 2s;
}
#container{
    width:85%;
    margin-left: auto;
    margin-right: auto;
}
#fleche_haut{
    position:fixed;
    top:92%;
    left:95%;
}
#back{
    position:fixed;
    top:10;
    left:10;
}
#path{
    font-size:1.5em;
}
</style>
<a href="/code" id="back" class="a-primary">🔙</a>
<a id="fleche_haut" href="#top" class="a-primary">haut</a>
<div id="container">
<br>
<div style="display:inline" id='path'><a href='/'>Pi-tau</a>><a href="/code">Code</a>><a href="#">Générateur de phrases ( code )</a></div><p></p>
<h1 style="display:inline"> Générateur de phrases en python </h1> <button id="go_to_editor" class="a-primary">Aller à l'éditeur</button><br>
<div id="code_a_copier">
<?php
echo file_get_contents("générer_phrases.txt");
?>
</div>

<h2 id="code"> Mettre à jour le code </h2>
<form action="" method="post">
<textarea name="texte">
<?php
echo file_get_contents("générer_phrases.txt");
?>
    </textarea><br>
    Mot de passe:
    <input type="password" name="password"><br>
    <input type="submit" value="Mettre à jour">
</form>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
</body>
</html>


<?php
if (isset($_POST["texte"]) && isset($_POST["password"]) && $_POST["password"] == "#") {
    file_put_contents("générer_phrases.txt", $_POST["texte"]);
    echo "Code mis à jour.";
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
</div>
<script> 
    go_to_editor=document.getElementById('go_to_editor');
    go_to_editor.onclick=function(){
        document.getElementById('code').scrollIntoView();
    }
    go_top=document.getElementById('fleche_haut');
    go_top.onclick=function(){
        document.getElementById('container').scrollIntoView();
    }
    copier=document.getElementById('copier');
    copier.onclick=function(){
        var copyText = document.getElementById("code_a_copier");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Copié dans le presse-papier: " + copyText.value);
    }
</script>