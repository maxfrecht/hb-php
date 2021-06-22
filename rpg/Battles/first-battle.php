<?php
include_once '../../poo/functions/dump.php';
include_once '../models/Mage.php';
include_once '../models/Rogue.php';
include_once '../models/Warrior.php';
include_once '../models/Gobelin.php';
include_once '../models/Aventurier.php';
include_once '../models/Explorateur.php';
include_once '../models/Veteran.php';
session_start();

if (isset($_POST['name'], $_POST['class'], $_FILES['file'])) {
    $characterName = $_POST['name'];
    $_SESSION['name'] = $characterName;
    $targetDir = '../images/';
    $targetFile = $targetDir . $_FILES['file']['name'];
    $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $urlAvatar = $targetFile;
        $_SESSION['avatar'] = $urlAvatar;
    } else {
        echo "Il y a eu une erreur pendant l'upload de la photo";
    }

    if (isset($urlAvatar)) {
        $_SESSION['character'] = new $_POST['class']($characterName, $urlAvatar);
        $race = new Race('Ancien');
        $_SESSION['character']->setRace($race);
    }

    if(isset($_POST['difficulty'])) {
        $_SESSION['difficulty'] = new $_POST['difficulty']($_SESSION['character']->getLevel());
    }
    $_SESSION['link'] = 'Next Battle';
    include_once '../templates/prepare-battle-template.php';

} elseif(isset($_SESSION['character'], $_SESSION['difficulty'])) {

    if($_SESSION['difficulty']->isFigthOver()) {
        include_once '../templates/battle-template.php';
    } else {
        include_once '../templates/prepare-battle-template.php';
    }
}




