<?php

session_start();

include_once('variables.php');

$message = strip_tags($_POST['message']);

if ( !isset($email) || !isset($password )) {
    $_SESSION['erreur'] = true;
    header('Location: /index.php');
}


