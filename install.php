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

function create_config_file($servername, $username, $password, $database) {
    $config_content = "<?php\n";
    $config_content .= "\$servername = '$servername';\n";
    $config_content .= "\$username = '$username';\n";
    $config_content .= "\$password = '$password';\n";
    $config_content .= "\$database = '$database';\n";
    $config_content .= "\$conn = new mysqli(\$servername, \$username, \$password, \$database);\n";
    $config_content .= "if (\$conn->connect_error) {\n";
    $config_content .= "    die(\"Połączenie nieudane: \" . \$conn->connect_error);\n";
    $config_content .= "}\n";
    $config_content .= "?>";

    file_put_contents('config.php', $config_content);
}

function create_database($servername, $username, $password, $database) {
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Połączenie nieudane: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas tworzenia bazy danych: " . $conn->error;
        $conn->close();
        return false;
    }
}

function create_tables($conn) {
    $sql = file_get_contents('baza_struktura.sql');
    if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
        echo "Tabele dodane poprawnie, wraz z uzupełnieniem danych.<br>";
    } else {
        echo "Błąd podczas tworzenia bazy: " . $conn->error;
    }
}

function insert_admin($conn, $admin_username, $admin_password) {
    $passwordHash = password_hash($admin_password, PASSWORD_DEFAULT);
    // Poprawione zapytanie SQL
    $sql = "INSERT INTO Uzytkownicy (Login, Haslo, RodzajUzytkownika) VALUES ('$admin_username', '$passwordHash', 'Administrator')";
    if ($conn->query($sql) === TRUE) {
        echo "Użytkownik z rolą administratora stworzony poprawnie.<br>";
    } else {
        echo "Error creating admin user: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['step']) && $_POST['step'] === '1') {
        $servername = $_POST['servername'];
        $username = $_POST['db_username'];
        $password = $_POST['db_password'];
        $database = $_POST['database'];

        if (create_database($servername, $username, $password, $database)) {
            create_config_file($servername, $username, $password, $database);
            header('Location: install.php?step=2');
            exit();
        }
    } elseif (isset($_POST['step']) && $_POST['step'] === '2') {
        include 'config.php';

        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($admin_password === $confirm_password) {
            create_tables($conn);
            insert_admin($conn, $admin_username, $admin_password);
            
            echo "<br>Usuń plik install.php, następnie zmodyfikuj prawo dostępu do config.php na tylko odczyt.<br>";
            echo "<br> ! Jeżeli nie usuniesz pliku install.php to wymagane będzie zainstalowanie programu od nowa !<br>";
            echo "<br>Zapraszamy do strony Jadłospis.<br>";
            echo "<form action='index.php'><input type='submit' value='Zakończ instalację' onclick=alert('Dziękujemy za skorzystanie z naszej usługi! Przekierowuję na stronę główną')/></form>";
            exit();
        } else {
            echo "Nieprawidłowe hasło.";
        }
    }
} else {
    if (isset($_GET['step']) && $_GET['step'] === '2') {
        ?>
        <form method="POST" action="install.php">
            <input type="hidden" name="step" value="2">
            <label for="admin_username">Login administratora:</label>
            <input type="text" id="admin_username" name="admin_username" required>
            <br>
            <label for="admin_password">Hasło administratora:</label>
            <input type="password" id="admin_password" name="admin_password" required>
            <br>
            <label for="confirm_password">Potwierdzenie hasła administratora:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br>
            <input type="submit" value="Zainstaluj">
        </form>
        <?php
    } else {
        ?>
        <form method="POST" action="install.php">
            <input type="hidden" name="step" value="1">
            <label for="servername">Serwer:</label>
            <input type="text" id="servername" name="servername" required>
            <br>
            <label for="db_username">Nazwa użytkownika:</label>
            <input type="text" id="db_username" name="db_username" required>
            <br>
            <label for="db_password">Hasło:</label>
            <input type="password" id="db_password" name="db_password">
            <br>
            <label for="database">Nazwa bazy danych (nazwa bazy musi być unikalna!):</label>
            <input type="text" id="database" name="database" required>
            <br>
            <input type="submit" value="Dalej">
        </form>
        <?php
    }
}
?>
</body>
</html>