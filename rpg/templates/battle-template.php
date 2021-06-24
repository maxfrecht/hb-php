<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Battle 1 result</title>
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body class="dungeon">
<div class="container container-hero">
    <?php
    $fighters = [$_SESSION['character'], $_SESSION['difficulty']->getCurrentMonster()];
    $_SESSION['difficulty']->doFight($fighters);

    if($_SESSION['character']->getHp() === 0) {
        echo  '<h1>Le '. $_SESSION['difficulty']->getCurrentMonster()->get_class().' a gagné ! avec '. $_SESSION['difficulty']->getCurrentMonster()->getHp().' point de vie</h1>';
    } else {
        $_SESSION['character']->levelUp();
        $_SESSION['difficulty']->incrementMonstersLevels();
        echo '<h1>'. $_SESSION['character']-> getName().' a gagné ! Il monte au niveau ' . $_SESSION['character']->getLevel() . '</h1>';
    }
    ?>
    <div class="heros">
        <?= $_SESSION['character']->toHTML() ?>
        <?= $_SESSION['difficulty']->getMonsters()[$_SESSION['difficulty']->getCurrentIndex()]->toHTML() ?>
    </div>

    <?php
    if($_SESSION['character']->getHp() === 0) {
        echo '<a class="btn" href="http://localhost:8000/rpg/">Recommencer</a>';

    } else {
        if(count($_SESSION['difficulty']->getMonsters()) - 1 === $_SESSION['difficulty']->getCurrentIndex()) {
            echo '<a class="btn" href="http://localhost:8000/rpg/Battles/winner.php">Get your trophee</a>';

        } else {
            echo '<a class="btn" href="http://localhost:8000/rpg/Battles/first-battle.php">'.$_SESSION['link'].'</a>';
        }
    }
    ?>
</div>

</body>
</html>