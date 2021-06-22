<?php
//form.php
if(isset($_FILES['fileTest'])) {
    $targetDir = 'images/';
    $targetFile = $targetDir . $_FILES['fileTest']['name'];
    $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES['fileTest']['tmp_name'], $targetFile)) {
        echo 'super';
    } else {
        echo "l'image n'a pas été uploadée";
    }
}
