<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">

    <title>Rpg Style PHP</title>
</head>
<body class="rpg">
<div class="container container-hero">
    <form class="hero-form" action="http://localhost:8000/rpg/Battles/first-battle.php" method="post"
          enctype="multipart/form-data">
        <h1>Création de personnage</h1>
        <label for="name" required>Name</label>
        <input type="text" name="name" id="name" placeholder="pseudo" minlength="3" maxlength="15">
        <label for="file">File</label>
        <input name="file" type="file">
        <label for="class">Class</label>
        <select name="class" id="class" required>
            <option value="Mage">Mage</option>
            <option value="Rogue">Voleur</option>
            <option value="Warrior">Guerrier</option>
        </select>
        <label for="difficulty">Difficulté</label>
        <select name="difficulty" id="class" required>
            <option value="Aventurier">aventurier</option>
            <option value="Explorateur">explorateur</option>
            <option value="Veteran">Vétéran</option>
        </select>
        <input type="submit" value="Créer mon personnage">
    </form>
</div>
</body>
</html>
