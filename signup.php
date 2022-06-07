<?php 

session_start();

include_once('header.php'); 


?>


<form method="POST" action="signup_POST.php" class="container mt-5">
    <h2>Formulaire d'inscription</h2>
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="
    <?php
    if (isset($_SESSION['signupEmail'])) {
        echo $_SESSION['signupEmail'] ;
        unset($_SESSION['signupEmail']);
    }
    ?>
    ">
    <?php
    if (isset($_SESSION['alreadyExist'])) {
        echo '<p>Cet e-mail existe déja !</p>';
        unset($_SESSION['alreadyExist']);
    }
    if (isset($_SESSION['erreur'])) {
        echo '<p>Entrer des données valides</p>';
        unset($_SESSION['erreur']);
    }
    ?>
    </div>
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
        <?php
        if (isset($_SESSION['confirmPassword'])) {
            echo '<p>Le mot de passe ne correspondent pas !</p>';
            unset($_SESSION['confirmPassword']);
        }
        ?>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>