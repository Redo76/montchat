<?php
session_start();

include_once('header.php');

?>

<?php if (isset($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger" role="alert">
            Entrez des données valides !
    </div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif ?>

<form method="POST" action="login_POST.php" class="container mt-5">
  <div class="mb-3">
    <label for="email" class="form-label">Adresse e-mail</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    <?php if (isset($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger" role="alert">
                E-mail Incorrecte !
        </div>
        <?php unset($_SESSION['erreur']); ?>
    <?php endif ?>
  </div>
  <div class="mb-3">
    <label for="mdp" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="mdp" id="mdp">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
  <section>
    <?php  ?>
  </section>
</form>
</body>
</html>