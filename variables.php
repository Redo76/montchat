<?php

include_once('PDO.php');

$userBDD = $db -> prepare('SELECT * FROM users');
$userBDD -> execute();
$users = $userBDD -> fetchAll();

$commentsBDD = $db -> prepare('SELECT * FROM comments');
$commentsBDD -> execute();
$comments = $commentsBDD -> fetchAll();
