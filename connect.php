<?php
    $host = "localhost";
    $user = "2025_nina_lop";
    $password = "406341";
    $dbname = "2025_nina_lop";

    // Próba połączenia
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Sprawdzenie połączenia
    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }

?>
