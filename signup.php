<?php 

session_start();

include_once('header.php');

$actualMail = '';
if (isset($_SESSION['signupEmail'])) {
    $actualMail = $_SESSION['signupEmail'] ;
    unset($_SESSION['signupEmail']);
}

?>

    <?php if (isset($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger" role="alert">
                Entrez des données valides !
        </div>
        <?php unset($_SESSION['erreur']); ?>
    <?php endif ?>


    <form method="POST" action="signup_POST.php" class="container mt-5">
        <h2>Formulaire d'inscription</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $actualMail ?>">
            
            <?php if (isset($_SESSION['alreadyExist'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Cet e-mail existe déja !
                </div>
                <?php unset($_SESSION['alreadyExist']); ?>
                <?php endif ?>
                
                <?php if (isset($_SESSION['alreadyExist'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        Cet e-mail existe déja !
                    </div>
                    <?php unset($_SESSION['alreadyExist']); ?>
        <?php endif ?>
        
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Prénom</label>
        <input type="text" required class="form-control" name="prenom" id="prenom" value="<?= isset($_SESSION['signupPrenom']) ? $_SESSION['signupPrenom'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Nom</label>
            <input type="text" required class="form-control" name="nom" id="nom" value="<?= isset($_SESSION['signupPrenom']) ? $_SESSION['signupPrenom'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" required class="form-control" name="mdp" id="mdp">
            
            <?php if (isset($_SESSION['erreurMdp'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Ce mot de passe doit contenir au moins avoir 8 caractères minimum, une lettre majuscule, une lettre minuscule et un chiffre
            </div>
            <?php unset($_SESSION['erreurMdp']); ?>
            <?php endif ?>
            
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Confirmation mot de passe</label>
            <input type="password" required class="form-control" name="mdpconf" id="mdpconf">
            
            <!-- Si la variable de session 'confirmPassword' existe, on affiche un message d'erreur  -->
            <?php if (isset($_SESSION['confirmPassword'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Les mots de passe ne correspondent pas !
                </div>
                <?php unset($_SESSION['confirmPassword']); ?>
                <?php endif ?>
                
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
</main>
</body>
</html>