<?php
session_start();

include_once('variables.php');

//Récuperation des inputs du formulaire
$prenom = strip_tags($_POST['prenom']);
$nom = strip_tags($_POST['nom']);
$password = strip_tags($_POST['mdp']);
$confirmPassword = strip_tags($_POST['mdpconf']);
$email = strip_tags($_POST['email']);

$_SESSION['signupEmail'] = $email;

function alreadyUser($db, $email){
    $e_mailBDD = $db -> prepare('SELECT e_mail FROM users');
    $e_mailBDD -> execute();
    $emailsUser = $e_mailBDD -> fetchAll();
    foreach ($emailsUser as $key => $emailUser) {
        if ($emailUser['e_mail'] === $email) {
            return true;
        }
    }
    return false;
} 

if ( !isset($prenom) || !isset($nom) || !isset($password ) || !isset($confirmPassword) || $email === '') {
    $_SESSION['erreur'];
    header('Location: /signup.php');
}


if ($password != $confirmPassword ) {
    $_SESSION['confirmPassword'] = true;
    header('Location: /signup.php');
}
else {
    if (alreadyUser($db, $email)) {
        echo 'qqchose';
        $_SESSION['alreadyExist'] = true;
        header('Location: /signup.php');
        return;
    }
    $sqlInscription = 'INSERT INTO users(e_mail,prenom, nom, password) VALUES (:e_mail, :prenom, :nom, :password)';
    $ajoutUser = $db -> prepare($sqlInscription);
    $ajoutUser -> execute([
        'e_mail' => $email,
        'prenom' => $prenom,
        'nom' => $nom,
        'password' => $password
    ]);
    echo 'Vous vous êtes inscrit sur ce site !';
}
?>

<?php include_once('header.php') ?>
<!-- <form method="POST" action="signup_POST.php" class="container mt-5">
    <h2>Formulaire d'inscription</h2>
    <div class="mb-3">
        <label for="mdp" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom">
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="mdp" id="mdp">
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Confirmation mot de passe</label>
        <input type="password" class="form-control" name="mdpconf" id="mdpconf">
        <span></span>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button> -->
