<?php

session_start();

include_once('variables.php');

$message = strip_tags($_POST['message']);

if ( !isset($message)) {
    $_SESSION['erreur'] = true;
    header('Location: /index.php');
}

$sqlCommentaires = 'INSERT INTO comments(user_id, comm_contenu) VALUES (:user_id, :comm_contenu)';

$ajoutMessage = $db -> prepare($sqlCommentaires);
$ajoutMessage -> execute([
    'user_id' => $_SESSION['loggedUser']['user_id'],
    'comm_contenu' => $message
]);

header('Location: index.php');