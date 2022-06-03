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
<ul class="nav nav-pills nav-fill mb-3">
  <li class="nav-item">
    <a class="nav-link" href="#">S'inscire</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Se connecter</a>
  </li>
</ul>
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
</form>
</body>
</html>