<?php
include_once '../../poo/functions/dump.php';
include_once '../models/Mage.php';
include_once '../models/Rogue.php';
include_once '../models/Warrior.php';
include_once '../models/Gobelin.php';
include_once '../models/Aventurier.php';
include_once '../models/Explorateur.php';
include_once '../models/Veteran.php';
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">

    <title>Document</title>
</head>
<body class="winner">
<div class="container container-hero"><h1>YOU ROCK !</h1>
    <div class="heros">
        <?= $_SESSION['character']->toHTML() ?>
    </div>
    <a class="btn" href="http://localhost:8000/rpg/index.php">Restart</a></div>
</body>
</html>
<?php
session_destroy();