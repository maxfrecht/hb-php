<?php

include_once './Personnage.php';

if(isset($_GET)) {
    $_GET['hobbies'] = explode('etaussi', $_GET['hobbies']);

    $createdPerso = new Personnage(
        $_GET['firstname'],
        $_GET['lastname'],
        $_GET['age'],
        $_GET['genre'],
        $_GET['job'],
        $_GET['hobbies']
    );
}
if(isset($createdPerso)) {
    $str = "Votre personnage se nomme " . $createdPerso->getFirstname() . " " . $createdPerso->getLastname() . ", il a " . $createdPerso->getAge() . " ans.  Son métier est " . $createdPerso->getJob() . ", c'est " . ($createdPerso->getGenre() === 'male' ? ' un homme.' : ' une femme') . ' Il aime';

    foreach ($createdPerso->getHobbies() as $hobby) {
        $str.= " ".$hobby.", ";
    }
    echo $str;
}