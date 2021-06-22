<?php

$errorFile = fopen('error.txt', 'a+');
$errors = explode('--er', fgets($errorFile));
fclose($errorFile);

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
    <div class="errors">
        <?php
            foreach ($errors as $error) {
                if ('' !== $error) {
                    echo '<div class="error">'.$error.'</div>';
                }
            }
            if (1 === count($errors)) {
                echo '<div class="success">Aucune erreur</div>';
            }
        ?>
    <a href="./handle-errors.php">Archiver les erreurs</a>
    </div>
</body>
</html>