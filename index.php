<?php  

include_once('header.php');



?>
<form method="POST" action="login.php" class="container mt-5">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="mdp" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="mdp">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
  <section>
    <?php  ?>
  </section>
</form>
</body>
</html>