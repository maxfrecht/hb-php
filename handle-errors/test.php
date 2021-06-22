<?php

function test($string)
{
    if ('aze123' === $string) {
        throw new Exception('Une erreur est survenue avec le mot : aze123');
    }

    return $string;
}

try {
    echo test('blabla');
    echo test('truc');
    echo test('aze123');
} catch (Exception $e) {
    $errorFile = fopen('error.txt', 'a+');
    fwrite($errorFile, $e->getMessage().'--er');
    fclose($errorFile);
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
    <a href="./errors.php">Voir les erreurs</a>
</body>
</html>