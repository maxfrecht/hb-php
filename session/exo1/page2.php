<?php
session_start();

if (isset($_SESSION['page2'])) {
    $_SESSION['page2']++;
}

include './template.php';

