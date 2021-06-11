<?php

$array = [1, 2, 2, 3, 3, 3, 4, 5, 5];


function doublon($array)
{
  foreach ($array as $value) {

    $keys = array_keys($array, $value);

    if (count($keys) > 1) {
      array_splice($array, $keys[0], 1);
    }
  }

  return $array;
}

print_r(doublon($array));
