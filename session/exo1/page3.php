<?php
session_start();

if (isset($_SESSION['page3'])) {
    $_SESSION['page3']++;
}

include './template.php';