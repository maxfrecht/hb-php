<?php

$pig = [
  'pattes' => 4,
  'oeil' => 1,
  'queue' => 1,
  'oreille' => 2
];

$dice = [
  'pattes',
  'oeil',
  'pattes',
  'queue',
  'pattes',
  'oreille'
];


$counter = 0;

function launchDiceAndSplicePig($dice, &$pig, &$counter)
{
  $key = rand(0, count($dice) - 1);
  $counter++;

  if ($pig[$dice[$key]] > 0) {
    $pig[$dice[$key]]--;
    $result = 'Tour n°' . $counter . ' : Vous avez trouvé ' . $dice[$key] . ' !';
  } else {
    $result = 'Tour n°' . $counter . ' : Vous avez déjà trouvé suffisamment de ' . $dice[$key] . '. Réessayer !';
  }

  return $result;
}

function playUntilEnd(&$pig, $dice, &$counter)
{
  while ($pig['pattes'] > 0 && $pig['oeil'] > 0 && $pig['queue'] > 0 && $pig['oreille'] > 0) {
    launchDiceAndSplicePig($dice, $pig, $counter);
  }

  return 'You win !';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php while ($pig['pattes'] > 0 || $pig['oeil'] > 0 || $pig['queue'] > 0 || $pig['oreille'] > 0) {
    echo launchDiceAndSplicePig($dice, $pig, $counter) . '<br>';
  }
  echo 'You win';
  ?>
</body>

</html>