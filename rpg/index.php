<?php
include_once '../assets/data/links.php';

include_once '../poo/functions/dump.php';

include_once './models/Race.php';

include_once './models/Hero.php';

include_once './models/Mage.php';

include_once './models/Rogue.php';

include_once './models/Warrior.php';

$heros = [];

$orc = new Race('Orc');
$ancien = new race('Ancien');

$merlin = new Mage('Merlin');

$merlin->setRace($ancien);
$merlin->setLevel(15);

$Rapetou = new Rogue('Rapetou');
$Rapetou->setRace($ancien);
$Rapetou->setLevel(8);
$bigBoy = new Warrior('BigBoy');
$bigBoy->setLevel(11);
$bigBoy->setRace($orc);

$heros[] = $merlin;
$heros[] = $Rapetou;
$heros[] = $bigBoy;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav>
    <div class="brand">LOGO</div>
    <div class="burger-btn"><span class="burger open"></span></div>
    <ul>
        <?php foreach ($links as $link => $href) {
    echo '<li><a href="'.$href.'"> '.$link.'</a></li>';
} ?>
    </ul>
    </nav>
    <main>
    <div class="container">
        <div class="heros">
            <?php
            foreach ($heros as $hero) {
                $hero->toHTML();
            }
            ?>
        </div>
    </div>
    </main>
</body>
</html>