<?php

$count = 0;
$compteur = fopen('compteur.txt', 'a+');
$countContent = fgets($compteur);
fclose($compteur);
$count = intval($countContent) | 0;
$compteur = fopen('compteur.txt', 'w+');
--$count;
fwrite($compteur, $count);
fclose($compteur);

$compteur = fopen('compteur.txt', 'a+');
$compteAAfficher = fgets($compteur);
fclose($compteur);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="exo-count">
        <div class="count-content">
            <div class="count-buttons">
                <a style="text-decoration:none" href="./index.php"><button>+</button></a>
                <a style="text-decoration:none" href="./compteurdown.php"><button>-</button></a>
            </div>
            <div class="count"><?php echo 'Compteur : '.$compteAAfficher; ?></div>
        </div>
    </div>
</body>
</html>