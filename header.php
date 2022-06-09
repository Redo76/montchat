

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Tchat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<header>
  <ul class="nav nav-pills nav-fill mb-3">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Accueil</a>
    </li>

    <?php if (!isset($_SESSION['loggedUser'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">S'inscire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Se connecter</a>
      </li>
    <?php endif ?>
    
    <?php if (isset($_SESSION['loggedUser'])) : ?>
      <li class="nav-item">
        <a class="nav-link bg-danger" href="logout.php">Se déconnecter</a>
      </li>
    <?php endif ?>

  </ul>
</header>
<main>