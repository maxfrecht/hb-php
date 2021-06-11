<?php

function showMultiplyTable(int $number)
{

  for ($i = 0; $i < 12; $i++) {
    echo $i + 1 . ' x ' . $number . ' = ' . ($i + 1) * $number . '<br>';
  }
}

showMultiplyTable(2);
