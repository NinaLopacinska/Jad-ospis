<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Jadłospis" />
    <title>Jadłospis</title>
    <link href="formularze.css" rel="stylesheet" />
</head>
<body>
    

<?php

$config_file = 'config.php';

if (!file_exists('install.php')){   
    include 'mainLogowanie.php';
} else {
    if (file_exists($config_file)) {
        if (is_writable($config_file)) {
            header('Location: install.php');
            exit();
        } else {
            echo "<p>Zmień uprawnienia do pliku <code>".$config_file."</code><br>np. <code>chmod o+w ".$config_file."</code></p>";
            echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
            exit();
        }
    } else {
        echo "<p>Stwórz plik <code>".$config_file."</code><br>np. <code>touch ".$config_file."</code></p>";
        echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
        exit();
    }
}    

?>
</body>
</html>


