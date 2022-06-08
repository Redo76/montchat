<?php

session_start();

include_once('variables.php');

$email = strip_tags($_POST['email']); 
$password = strip_tags($_POST['mdp']);

if ( !isset($email) || !isset($password )) {
    $_SESSION['erreur'] = true;
    header('Location: /login.php');
}

function getUser($users, $email){
    $users;
    foreach ($users as $key => $user) {
        if ($user['e_mail'] === $email) {
            return $user;
        }
    }
    return false;
} 

$getUser = getUser($users, $email);

if (!$getUser) {
    $_SESSION['erreurEmail'] = true;
    header('Location: /login.php');
}
else if (password_verify($password, $getUser['password'])) {
    $loggedUser = [
        'email' => $getUser['e_mail'],
        'prenom' => $getUser['prenom'],
        'nom' => $getUser['nom']
    ];

    header('Location: /index.php');

    $_SESSION['loggedUser'] = $loggedUser;

}{

}