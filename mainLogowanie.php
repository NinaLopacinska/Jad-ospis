
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
    <div class="container">
        <h2>Zaloguj się</h2>
        <form id="loginForm" method="POST">
            <label for="Login">Login:</label>
            <input type="text" id="Login" name="Login" required>
            <label for="Haslo">Hasło:</label>
            <input type="password" id="Haslo" name="Haslo" required>
            <input type="submit" value="Zaloguj">
        </form>
        <p class="message">Jeżeli nie posiadasz jeszcze konta <a href="rejestracja.php">zarejestruj się</a></p>
    </div>

    <?php
    session_start(); // Uruchomienie sesji
    include 'config.php'; // Włączenie pliku z połączeniem

    // Obsługa logowania po wysłaniu formularza
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['Login'];
    $haslo = $_POST['Haslo'];

    // Przygotowanie zapytania SQL za pomocą prepared statements
    $stmt = $conn->prepare("SELECT Id, Haslo, RodzajUzytkownika FROM Uzytkownicy WHERE Login = ?");
    if (!$stmt) {
        echo "Błąd w przygotowaniu zapytania SQL: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    // Sprawdzenie czy użytkownik istnieje
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $stored_password, $rodzaj_uzytkownika);
        $stmt->fetch();

        // Sprawdzenie hasła
        if (password_verify($haslo, $stored_password)) {
            // Poprawne logowanie - przekierowanie na odpowiednią stronę
            $_SESSION['user_id'] = $user_id;
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = $rodzaj_uzytkownika;

            switch ($rodzaj_uzytkownika) {
                case 'PracownikKuchni':
                    header("Location: mainPracownik.php");
                    exit();
                case 'Uczen':
                    header("Location: mainUczen.php");
                    exit();
                case 'Administrator':
                    header("Location: mainAdministrator.php");
                    exit();
                default:
                    echo '<p style="color: red;">Nie masz dostępu do tej sekcji.</p>';
                    break;
            }
        } else {
            echo '<p style="color: red;">Błędny login lub hasło.</p>';
        }
    } else {
        echo '<p style="color: red;">Błędny login lub hasło.</p>';
    }

    $stmt->close();
    }

    $conn->close();
    ?>

</body>
</html>