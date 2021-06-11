<?php

function checkPassword(string $psw): bool
{
  if (strlen($psw) < 9 || !str_contains($psw, '@')) {
    return false;
  } else {
    return true;
  }
}

var_dump(checkPassword('@dfgmjsfdfgdsfgsfdg'));
