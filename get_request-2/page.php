<?php

$pages = [
    'firstPage' => 'Texte première page',
    'secondPage' => 'Texte seconde page',
];

if (isset($_GET['page'])) {
    echo $pages[$_GET['page']];
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