<?php
session_start();

include_once('variables.php');

//Récuperation des inputs du formulaire
$prenom = strip_tags($_POST['prenom']);
$nom = strip_tags($_POST['nom']);
$password = strip_tags($_POST['mdp']);
$confirmPassword = strip_tags($_POST['mdpconf']);
$email = strip_tags($_POST['email']);

// On stocke les variables en session pour pouvoir les réafficher lorsqu'il y a une erreur dans le formulaire
$_SESSION['signupEmail'] = $email;
$_SESSION['signupPrenom'] = $prenom;
$_SESSION['signupNom'] = $nom;

// Création d'une fonction qui retourn VRAI lorsque l'email que l'on rentre dans le formulaire est le meme que dans la base de donnée
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


$regexMdp = preg_match('%^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$%', $password);


if ( !isset($prenom) || !isset($nom) || !isset($password ) || !isset($confirmPassword)) {
    $_SESSION['erreur'];
    header('Location: /signup.php');
}

else if ($regexMdp === 0) {
    $_SESSION['erreurMdp'] = true;
    header('Location: /signup.php');
    var_dump($regexMdp);
}

else if ($password != $confirmPassword ) {
    $_SESSION['confirmPassword'] = true;
    header('Location: /signup.php');
}

else if ($prenom === '' || $nom === '' || $password === '' || $confirmPassword === '' || $email === '') {
    $_SESSION['erreurChamp'];
    header('Location: /signup.php');
}

else {
    if (alreadyUser($db, $email)) {
        echo 'qqchose';
        $_SESSION['alreadyExist'] = true;
        header('Location: /signup.php');
        return;
    }
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sqlInscription = 'INSERT INTO users(e_mail,prenom, nom, password) VALUES (:e_mail, :prenom, :nom, :password)';
    $ajoutUser = $db -> prepare($sqlInscription);
    $ajoutUser -> execute([
        'e_mail' => $email,
        'prenom' => $prenom,
        'nom' => $nom,
        'password' => $passwordHash
    ]);
    
    $_SESSION['signup'] = true;
}
?>

<?php include_once('header.php') ?>
<?php if (isset($_SESSION['signup'])) : ?>
        <div class="alert alert-success" role="alert">
            Vous vous êtes inscrits !
        </div>
        <?php unset($_SESSION['signup']); ?>
        <?php endif ?>
