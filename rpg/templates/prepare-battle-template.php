
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Battle 2</title>
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body class="dungeon">
<div class="container container-hero">
    <h1><?= $_SESSION['character']->getName() ?><img src="../images/sword.png" alt=""> <?= $_SESSION['difficulty']->getCurrentMonster()->getName()?> </h1>
    <div class="heros">
        <?= $_SESSION['character']->toHTML() ?>
        <?= $_SESSION['difficulty']->getCurrentMonster()->toHTML() ?>
        <?php $_SESSION['difficulty']->setIsFigthOver(true) ?>
    </div>
    <?= '<a class="btn" href="http://localhost:8000/rpg/Battles/first-battle.php">Battle !</a>' ?>
</div>
</body>
</html>