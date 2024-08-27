<?php
session_start();

// Wczytanie pliku z połączeniem do bazy danych
include 'config.php';

// Zainicjowanie zmiennych na login i hasło
$login = "";
$login_error = "";
$delete_confirm = false;
$delete_error = "";
$user_id = "";

// Sprawdzenie czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_confirm"])) {
        // Administrator potwierdził usunięcie konta
        if ($_POST["delete_confirm"] == "yes" && isset($_SESSION['deleteUserId'])) {
            // Usunięcie konta z bazy danych
            $delete_query = "DELETE FROM Uzytkownicy WHERE Id = ?";
            $stmt_delete = $conn->prepare($delete_query);
            $stmt_delete->bind_param("i", $_SESSION['deleteUserId']);
            if ($stmt_delete->execute()) {
                unset($_SESSION['deleteUserId']);
                header("Location: mainAdministrator.php");
                exit();
            } else {
                $delete_error = "Błąd podczas usuwania konta.";
            }
            $stmt_delete->close();
        } else {
            unset($_SESSION['deleteUserId']);
        }
    } else {
        // Pobranie danych z formularza
        $login = $_POST["login"];

        // Walidacja loginu
        $login = htmlspecialchars($login);

        // Zapytanie do bazy danych, aby sprawdzić czy istnieje użytkownik o podanym loginie
        $sql = "SELECT Id FROM Uzytkownicy WHERE Login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Użytkownik o podanym loginie istnieje
            $row = $result->fetch_assoc();
            $_SESSION['deleteUserId'] = $row['Id'];
            $delete_confirm = true;
            $login_error = "";
        } else {
            // Użytkownik o podanym loginie nie istnieje
            $login_error = "Użytkownik o podanym loginie nie istnieje";
        }

        // Zamknięcie prepared statement
        $stmt->close();
    }
}

// Zamknięcie połączenia z bazą danych
$conn->close();
?>

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
    <a href="mainAdministrator.php" class="home-link">⌂</a>
    <div class="container">
        <h2>Usunięcie konta użytkownika</h2>

        <?php if (!empty($delete_error)): ?>
            <div class="error-message">
                <p><?php echo $delete_error; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($delete_confirm): ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <p>Czy napewno chcesz usunąć konto tego użytkownika?</p>
                <button type="submit" name="delete_confirm" value="yes">Tak</button>
                <button type="submit" name="delete_confirm" value="no">Nie</button>
            </form>
        <?php else: ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="login">Podaj login użytkownika:</label>
                <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>" required>
                <span class="error-message"><?php echo $login_error; ?></span>

                <button type="submit">Usuń konto</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
