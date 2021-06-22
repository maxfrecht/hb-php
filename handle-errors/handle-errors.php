<?php

$errorFile = fopen('error.txt', 'a+');
$errorFileContent = fgets($errorFile);
fclose($errorFile);
$globalErrorsFile = fopen('global-errors.txt', 'a+');
fwrite($globalErrorsFile, $errorFileContent);
fclose($globalErrorsFile);
$errorFile = fopen('error.txt', 'w+');
fwrite($errorFile, '');
fclose($errorFile);
header('Location: http://localhost:8000/handle-errors/errors.php');
