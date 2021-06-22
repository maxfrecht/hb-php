<?php

$errors = [];

if(isset($_POST)) {

    if(2 <= strlen($_POST['firstname']) && strlen($_POST['firstname']) <= 20) {
        echo $_POST['firstname'];
    } else {
        $errors['firstname'] = 'Le format du firstname ne convient pas';
    }
    if(2 <= strlen($_POST['lastname']) && strlen($_POST['lastname']) <= 20) {
        echo $_POST['lastname'];
    } else {
        $errors['lastname'] = 'Le format du lastname ne convient pas';
    }
    if(intval($_POST['age']) > 0 && intval($_POST['age']) < 99) {
        echo $_POST['age'];
    }
    if($_POST['genre'] === 'female' || $_POST['genre'] === 'male') {
        echo $_POST['genre'];
    } else {
        $errors['genre'] = 'Merci de renseigner le champ genre';
    }
    if(2 <= strlen($_POST['job']) && strlen($_POST['job']) <= 99) {
        echo $_POST['job'];
    } else {
        $errors['job'] = 'Le format du job ne convient pas';
    }
    if(isset($_POST['hobbies'])) {
        if(count($_POST['hobbies']) >= 2) {
            foreach ($_POST['hobbies'] as $hobby) {
                echo $hobby;
            }
        } else {
            $errors['hobbies'] = 'Merci de renseigner deux hobby minimum';

        }
    } else {
        $errors['hobbies'] = 'Merci de renseigner deux hobby minimum';
    }


}
if(isset($errors)) {
    if(count($errors) > 0) {
        $location = 'http://localhost:8000/forms/test.php?';
        foreach($errors as $key => $error) {
            $location.= $key . "=" . urlencode($error) . '&';
        }
        header('Location:' . $location . '/');
    }
}

if(empty($errors)) {
    $location = 'http://localhost:8000/forms/success.php?';
    $_POST['hobbies'] = $_POST['hobbies'][0] . 'etaussi' . $_POST['hobbies'][1];
    foreach($_POST as $key => $value) {

        var_dump($value);
        $location.= $key . "=" . urlencode($value) . '&';
    }
    header('Location:' . $location);
}


