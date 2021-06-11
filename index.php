<?php

include_once './assets/data/links.php';

$age = 27;
$array = [12, 15, 19, 2];
$tva = 20 / 100;
$nbrProduit = 5;
$prix = 15.32;
$prixTotal = $nbrProduit * $prix;
$celsius = -75;

$eleves = [
    'Albert' => [12, 8, 9, 7, 13],
    'Michel' => [14, 13, 12, 11, 10],
    'Vincent' => [17, 16, 15, 18, 13],
];

if ($celsius >= 70) {
    $etat = 'gazeux';
} elseif ($celsius >= 0) {
    $etat = 'liquide';
} else {
    $etat = 'solide';
}

/**
 * @param int[]
 */
function calcAverage(array $notes): float
{
    $sum = 0;
    $count = 0;
    foreach ($notes as $note) {
        $sum += $note;
        ++$count;
    }

    return $sum / $count;
}

function calcPrice(float $price, float $pourcent): float
{
    return round(($price + ($price * $pourcent)), 2);
}

function createArray(string $key, string $key2, string $key3, string $value, int $value2, int $value3): array
{
    return [
        $key => $value,
        $key2 => $value2,
        $key3 => $value3,
    ];
}

$warrior = createArray('name', 'hp', 'damages', 'Warrior', 540, 25);
$mage = createArray('name', 'hp', 'damages', 'Mage', 430, 31);
$heros = [$warrior, $mage];

function showHeroes(array $heros): string
{
    $html = '<div>';
    foreach ($heros as $hero) {
        $html .= '<ul>';
        foreach ($hero as $prop => $value) {
            $html .= '<li>'.$prop.' : '.$value.'</li>';
        }
        $html .= '</ul></br>';
    }

    return $html;
}

//jour2 - exo 6
function getCrit(int $damage)
{
    if (rand(0, 100) > 15) {
        return $damage;
    }

    return $damage * 1.5;
}

function herosFight(array $hero, array $hero2)
{
    $winner = '';
    $turn = 1;
    while ($hero['hp'] > 0 && $hero2['hp'] > 0) {
        $damageHero2 = getCrit($hero2['damages']);
        $hero['hp'] -= $damageHero2;
        $crit2 = $damageHero2 > $hero2['damages'];

        if ($hero['hp'] <= 0) {
            $winner = $hero2['name'];

            break;
        }
        $damageHero = getCrit($hero['damages']);
        $hero2['hp'] -= $damageHero;
        $crit = $damageHero > $hero['damages'];
        if ($hero2['hp'] <= 0) {
            $winner = $hero['name'];

            break;
        }
        echo '<h4>Tour '.$turn.'</h4>';
        echo '<p>Le hero '.$hero2['name'].' a tapé '.($crit2 ? '<strong>' : '').$damageHero2.($crit2 ? '</strong>' : '').' dommages</p><p>Il reste '.$hero['hp'].'hp au hero '.$hero['name'].'</p><br>';
        echo '<p>Le hero '.$hero['name'].' a tapé '.($crit ? '<strong>' : '').$damageHero.($crit ? '</strong>' : '').' dommages</p><p>Il reste '.$hero2['hp'].'hp au hero '.$hero2['name'].'</p>';
        echo '</br>';
        ++$turn;
    }
    if ($winner) {
        echo '<p> Le gagnant est '.$winner.'</p>';
    }
}

$herosList = showHeroes($heros);

function createDamier()
{
    $array = [];
    $column = [1, 2, 3, 4, 5, 6, 7, 8];
    $row = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    $white = false;

    for ($i = 0; $i < count($row); ++$i) {
        $white = $column[$i] % 2 === 0 ? true : false;
        for ($j = 0; $j < count($column); ++$j) {
            $array[$column[$i].$row[$j]] = $white ? 'white' : 'black';
            $white = !$white;
        }
    }

    return $array;
}

function showDamier(array $damier)
{
    $html = '';
    $html .= '<div class="col-8 d-flex damier flex-wrap mx-auto">';
    foreach ($damier as $case => $couleur) {
        $html .= '<div class="col-1 '.$couleur.'"></div>';
    }
    $html .= '</div>';

    return $html;
}

$damier = createDamier();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">
  <script src="index.js" type="module" defer></script>
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
    <!-- <p>Vous êtes né en <?php echo date('Y') - $age; ?>.</p>
    <p>La moyenne des valeurs du tableau est de <?php echo array_sum($array) / count($array); ?>.</p>
    <p>Le total TTC pour <?php echo $nbrProduit; ?> produits à <?php echo $prix; ?> € est de <?php echo calcPrice($prixTotal, $tva); ?> €.</p>
    <p>L'eau est actuellement à l'état <?php echo $etat; ?>.</p>
    <p>La moyenne d'Albert est de <?php echo calcAverage($eleves['Albert']); ?>/20.</p>
    <p>La moyenne de Michel est de <?php echo calcAverage($eleves['Michel']); ?>/20.</p>
    <p>La moyenne de Vincent est de <?php echo calcAverage($eleves['Vincent']); ?>/20.</p>
    <br> -->
    <?php echo showDamier($damier); ?>
  </main>
</body>

</html>