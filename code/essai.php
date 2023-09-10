<?php
if ($_GET['contenu']==1){
    echo 'Mot de passe correct !';
    setcookie('password','true');
}
else{
    echo 'Mot de passe erroné, veuillez réessayer.';
    setcookie('password','false');
} ?>
