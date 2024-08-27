<?php
session_start();

// Wczytanie pliku z połączeniem do bazy danych
include 'config.php';

// Zainicjowanie zmiennych na login i hasło
$login = "";
$password = "";
$newPassword = "";
$newPasswordRepeat = "";
$login_error = "";
$password_error = "";
$new_password_error = "";
$success_message = "";

// Sprawdzenie czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $login = $_POST["login"];
    $password = $_POST["password"];
    $newPassword = $_POST["newPassword"];
    $newPasswordRepeat = $_POST["newPasswordRepeat"];

    // Walidacja loginu i hasła
    $login = htmlspecialchars($login);

    // Zapytanie do bazy danych, aby sprawdzić czy istnieje użytkownik o podanym loginie
    $sql = "SELECT Id, Haslo FROM Uzytkownicy WHERE Login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Użytkownik o podanym loginie istnieje, sprawdź hasło
        $row = $result->fetch_assoc();
        $hashed_password = $row['Haslo'];

        if (password_verify($password, $hashed_password)) {
            // Hasło się zgadza, ustaw sesję z ID użytkownika
            $_SESSION['userId'] = $row['Id'];
            $login_error = "";
            $password_error = "";

            // Aktualizacja hasła, jeśli zostało podane nowe hasło
            if (!empty($newPassword)) {
                // Sprawdzenie czy nowe hasło i powtórzone hasło są identyczne
                if ($newPassword === $newPasswordRepeat) {
                    // Zahaszowanie nowego hasła
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Aktualizacja hasła w bazie danych
                    $update_query = "UPDATE Uzytkownicy SET Haslo = ? WHERE Id = ?";
                    $stmt_update = $conn->prepare($update_query);
                    $stmt_update->bind_param("si", $passwordHash, $_SESSION['userId']);

                    if ($stmt_update->execute()) {
                        $success_message = "Hasło zostało pomyślnie zaktualizowane.";
                    } else {
                        $new_password_error = "Błąd podczas aktualizacji hasła.";
                    }

                    // Zamknięcie prepared statement
                    $stmt_update->close();
                } else {
                    $new_password_error = "Nowe hasło i powtórzone hasło nie są identyczne.";
                }
            }
        } else {
            // Nieprawidłowe hasło
            $password_error = "Nieprawidłowe hasło";
        }
    } else {
        // Użytkownik o podanym loginie nie istnieje
        $login_error = "Użytkownik o podanym loginie nie istnieje";
    }

    // Zamknięcie prepared statement
    $stmt->close();
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
<a href="mainUczen.php" class="home-link">⌂</a>
    <div class="container">
        <h2>Weryfikacja danych i zmiana hasła</h2>

        <?php if (!empty($success_message)): ?>
            <div class="success-message">
                <p><?php echo $success_message; ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>" required>
            <span class="error-message"><?php echo $login_error; ?></span>

            <label for="password">Obecne hasło:</label>
            <input type="password" id="password" name="password" required>
            <span class="error-message"><?php echo $password_error; ?></span>

            <label for="newPassword">Nowe hasło:</label>
            <input type="password" id="newPassword" name="newPassword">
            <span class="error-message"><?php echo $new_password_error; ?></span>

            <label for="newPasswordRepeat">Powtórz nowe hasło:</label>
            <input type="password" id="newPasswordRepeat" name="newPasswordRepeat">

            <button type="submit">Zmień hasło</button>
        </form>
    </div>
</body>
</html>
