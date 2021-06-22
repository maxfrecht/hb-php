<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="http://localhost:8000/forms/test.php" method="post">
    <label for="firstname">firstname</label>
    <input type="text" name="firstname" id="firstname">
    <?php if(isset($_GET['firstname'])) {
        echo '<p style="color:red">' . $_GET['firstname'] . '</p>';
    }
    ?>
    <label for="lastname">lastname</label>
    <input type="text" name="lastname" id="lastname">
    <?php if(isset($_GET['lastname'])) {
        echo '<p style="color:red">' . $_GET['lastname'] . '</p>';
    }
    ?>
    <label for="age">age</label>
    <input type="text" name="age" id="age">
    <?php if(isset($_GET['age'])) {
        echo '<p style="color:red">' . $_GET['age'] . '</p>';
    }
    ?>
    <label for="genre">genre</label>
    <input type="radio" name="genre" id="male" value="male">
    <input type="radio" name="genre" id="female" value="female">
    <?php if(isset($_GET['genre'])) {
        echo '<p style="color:red">' . $_GET['genre'] . '</p>';
    }
    ?>
    <label for="job">Job</label>
    <input type="text" name="job" id="job">
    <?php if(isset($_GET['job'])) {
        echo '<p style="color:red">' . $_GET['job'] . '</p>';
    }
    ?>
    <label for="hobbies"></label>
    <select multiple name="hobbies[]" id="hobbies">
        <option name="music" value="music">musique</option>
        <option name="dance" value="dance">Dance</option>
        <option name="video-games" value="video-games">Jeux Videos</option>
    </select>
    <?php if(isset($_GET['hobbies'])) {
        echo '<p style="color:red">' . $_GET['hobbies'] . '</p>';
    }
    ?>
    <button type="submit">Send</button>
</form>
</body>
</html>
