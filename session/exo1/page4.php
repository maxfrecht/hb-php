<?php
session_start();

if (isset($_SESSION['page4'])) {
    $_SESSION['page4']++;
}

include './template.php';