<?php

function createNavale()
{
  $array = [];
  $column = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  $row = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];


  for ($i = 0; $i < count($row); $i++) {
    for ($j = 0; $j < count($column); $j++) {
      $array[$column[$i] . $row[$j]] = 'empty';
    }
  }

  return $array;
}

function addShip(array $navale, $length)
{
  $columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
  $column = rand(0, 100) > 50 ? true : false;
  $count = 0;
  while ($count <= $length) {
    $start = rand(1, 4);
    if ($column) {
      $key = rand(0, 7);
      if (checkShips($columns[$key], $start, $navale, $column, $length)) {
        for ($i = $start; $i < $start + $length; $i++) {
          $navale[($i + 1) . $columns[$key]] = 'bateau';
          $count++;
        }
      }
    } else {
      $key = rand(1, 10);
      if (checkShips($columns[0], $key, $navale, $column, $length)) {
        for ($i = $start; $i < $start + $length - 1; $i++) {
          $navale[$key . $columns[$i]] = 'bateau';
          $count++;
        }
      }
    }
  }
  return $navale;
}

function checkShips(string | int $coordColumn, string | int $coordRow, array $navale, bool $column, int $length)
{
  $columns = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

  if ($column) {
    $key = array_keys($columns, $coordColumn)[0];
    if ($navale[$coordRow . $columns[$key]] === 'empty') {
      for ($i = 0; $i < $length; $i++) {
        if ($navale[$coordRow . $columns[$key + ($i + 1)]] === 'bateau') {
          return false;
        }
      }
    }
  } else {
    if ($navale[$coordRow . $coordColumn] === 'empty') {
      for ($i = 0; $i < $length; $i++) {
        if ($navale[$coordRow + ($i + 1) . $coordColumn] === 'bateau') {
          return false;
        }
      }
    }
  }

  return true;
}

function addShips(array $navale)
{
  $ships = [5, 3, 2];

  $navale = addShip($navale, 5);
  $navale = addShip($navale, 3);
  $navale = addShip($navale, 2);


  return $navale;
}

function showNavale(array $damier)
{
  $html = '';
  $html .= '<div class="col-8 d-flex navale flex-wrap mx-auto">';
  foreach ($damier as $case => $bateau) {
    $html .= '<div class="col-1 ' . $bateau . '" title=' . $case . '></div>';
  }
  $html .= '<div id="cursor"></div></div>';
  return $html;
}

$navale = createNavale();
$navale = addShips($navale);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bataille Navale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/navale.js" defer></script>
  <script src="./js/cursor.js" defer></script>
</head>

<body>
  <?= showNavale($navale)  ?>
</body>

</html>