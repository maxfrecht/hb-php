<?php

include_once '../poo/functions/dump.php';

// $file = fopen('text.txt', 'a+');
// fwrite($file, "J'aime les fruits au sirop</br>");
// fclose($file);
// $file = fopen('text.txt', 'a+');
// $fileContent = fgets($file);
// fclose($file);

// $file2 = fopen('text2.txt', 'a+');
// fwrite($file2, 'La vengeance est un plat qui se mange
// sans sauce<br>');
// fclose($file2);
// $file2 = fopen('text2.txt', 'a+');
// $fileContent2 = fgets($file2);
// fclose($file2);

// $file3 = fopen('text3.txt', 'a+');
// fwrite($file3, $fileContent.$fileContent2);
// fclose($file3);

// $file3 = fopen('text3.txt', 'a+');
// $fileContent3 = fgets($file3);
// fclose($file3);

// echo $fileContent3;

//* Exo2

$count = 0;
$compteur = fopen('compteur.txt', 'a+');
$countContent = fgets($compteur);
fclose($compteur);
$count = intval($countContent) | 0;
$compteur = fopen('compteur.txt', 'w+');
++$count;
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
            <div class="cube">
                <div class="count-buttons">
                    <a style="text-decoration:none" href="./index.php"><button>+</button></a>
                    <a style="text-decoration:none" href="./compteurdown.php"><button>-</button></a>
                    </div>
                <div class="count"><?php echo 'Compteur : '.$compteAAfficher; ?><div class="count-back">Coucou</div></div>
                
            </div>
        </div>
    </div>
</body>
</html>