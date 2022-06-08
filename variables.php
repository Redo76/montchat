<?php

include_once('PDO.php');

$userBDD = $db -> prepare('SELECT * FROM users');
$userBDD -> execute();
$users = $userBDD -> fetchAll();

$commentsBDD = $db -> prepare('SELECT users.prenom, users.nom, comments.comm_date, comments.comm_contenu from users inner join comments on users.user_id = comments.user_id;');
$commentsBDD -> execute();
$comments = $commentsBDD -> fetchAll();


