<?php

$str = '';

if (isset($_GET['firstname'])) {
    $str .= 'Mon prénom est '.$_GET['firstname'].',';
}

if (isset($_GET['lastname'])) {
    $str .= ' mon nom est '.$_GET['lastname'].',';
}

if (isset($_GET['sexe'])) {
    $str .= ' je suis de sexe '.$_GET['sexe'];
}

if (isset($_GET['age'])) {
    $str .= " j'ai ".$_GET['age'].' ans,';
}

if (isset($_GET['job'])) {
    $str .= ' mon métier est '.$_GET['job'].'.';
}

$strArr = str_split($str);

if (',' === $strArr[count($strArr) - 1]) {
    $str = substr_replace($str, '.', -1);
}

if (' ' === $strArr[0]) {
    $str = ltrim($str, $str[0]);
    $str = ucfirst($str);
}

echo $str;
