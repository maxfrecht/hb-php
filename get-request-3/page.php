<?php

function foundNumbers($string)
{
    $numberArr = str_split($string);
    $countIterate = 0;
    $rand = random_int(1, 9);
    foreach ($numberArr as $number) {
        do {
            $rand = random_int(1, 9);
            ++$countIterate;
        } while ($rand !== intval($number));
    }

    return $countIterate;
}

if (isset($_GET['number'])) {
    $iterations = [];

    for ($i = 0; $i < 10; ++$i) {
        $iterations[] = foundNumbers($_GET['number']);
    }

    echo 'En moyenne, sur les 10 essaies, il a fallu '.array_sum($iterations) / count($iterations).' iterations pour trouver le paramètre number.';
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
    <a href="./">Retour</a>
</body>
</html>