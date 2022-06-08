<?php  
session_start();

include_once('header.php');
include_once('variables.php');

?>

<?php if (isset($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger" role="alert">
            Entrez des données valides !
    </div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif ?>

<h1> Bienvenue <?= isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser']['prenom'] : 'étranger' ?>. </h1>
<?php if (!isset($_SESSION['loggedUser'])) : ?>
  <p>Afin de pouvoir commenter, veuillez vous connecter.</p>
<?php endif ?>

<?php if (isset($_SESSION['loggedUser'])) : ?>
  <form action="message_POST.php" method="POST">
    <div>
      <label for="message" class="form-label">Commentaires</label>
      <input type="text" class="form-control" name="message" id="message" aria-describedby="emailHelp" required>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
<?php endif ?>
<div class="container">
  <?php foreach ($comments as $key => $comment) : ?>
    <div class=" d-flex justify-content-around">
      <p><?= $comment['prenom']. ' ' . $comment['nom'] ?></p>
      <p><?= $comment['comm_date']?></p>
      <p><?= $comment['comm_contenu']?></p>
    </div>
  <?php endforeach ?>
</div>
</body>
</html>