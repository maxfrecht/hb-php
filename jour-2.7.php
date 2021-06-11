<?php

function launchDices(): array
{
  $dices = [];
  for ($i = 0; $i < 5; $i++) {
    $dices[] = rand(1, 6);
  }

  return $dices;
}

function checkResult(array $dices): string
{
  $result = '';
  foreach ($dices as $dice) {
    if (isset(array_keys($dices, $dice + 1)[0]) && isset(array_keys($dices, $dice + 2)[0]) && isset(array_keys($dices, $dice + 3)[0]) && isset(array_keys($dices, $dice + 4)[0])) {
      $result = 'grande suite';
      break;
    } elseif (isset(array_keys($dices, $dice + 1)[0]) && isset(array_keys($dices, $dice + 2)[0]) && isset(array_keys($dices, $dice + 3)[0])) {
      $result = 'petite suite';
    }
  }

  foreach ($dices as $dice) {
    if (count(array_keys($dices, $dice)) > 4) {
      $result = 'Yams';
      break;
    } elseif (count(array_keys($dices, $dice)) > 3) {
      $result = 'Carré';
      break;
    } elseif (count(array_keys($dices, $dice)) > 2) {
      $result = 'Brelan';
      $differentValues = doublon($dices);
      if (count($differentValues) === 2) {
        $result = 'Full';
        break;
      }
    }
  }
  return $result;
}

function doublon($array)
{
  foreach ($array as $value) {

    if (count(array_keys($array, $value)) > 1) {
      $keys = array_keys($array, $value);
      array_splice($array, $keys[0], 1);
    }
  }

  return $array;
}

$launch = launchDices();
print_r($launch);
$result = checkResult($launch);
print_r($result);
