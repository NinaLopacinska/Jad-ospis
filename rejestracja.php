<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Jadłospis" />
    <title>Jadłospis</title>
    <link href="formularze.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Zarejestruj się</h2>
        <form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="firstName">Imię:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>" required>

            <label for="lastName">Nazwisko:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>" required>

            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>" required>

            <div class="password-container">
                <label for="password"></label>Hasło:<span class="show-hide-password" role="img" aria-label="Pokaż hasło">🔒</span>
                
                <input type="password" id="password" name="password" required>
                
            </div>

            <div class="password-container">
                <label for="passwordReturn"></label>Powtórz hasło:<span class="show-hide-password" role="img" aria-label="Pokaż hasło">🔒</span>
                <input type="password" id="passwordReturn" name="passwordReturn" required>
                
            </div>

            <?php
            // Display validation errors if there are any
            if (!empty($errors)) {
                echo '<div class="error-message">';
                foreach ($errors as $error) {
                    echo '<p>' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
            }
            ?>

            <button type="submit" class="button">Zarejestruj</button>
        </form>
        <p class="message">Jeżeli już posiadasz konto <a href="mainLogowanie.php">zaloguj się</a>.</p>
    </div>
    
    <?php
    include 'config.php';

    $errors = []; // Array to store validation errors

    // Process form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = trim($_POST["firstName"]);
        $lastName = trim($_POST["lastName"]);
        $login = trim($_POST["login"]);
        $password = $_POST["password"];
        $passwordReturn = $_POST["passwordReturn"];

        // Validate and sanitize input
        $firstName = htmlspecialchars($firstName);
        $lastName = htmlspecialchars($lastName);
        $login = htmlspecialchars($login);

        // Validate names (only allow letters and whitespace)
        if (!preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]*$/", $firstName)) {
            $errors[] = "Imię może zawierać tylko litery i białe znaki.";
        }
        if (!preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]*$/", $lastName)) {
            $errors[] = "Nazwisko może zawierać tylko litery i białe znaki.";
        }

        // Validate login (only allow alphanumeric characters)
        if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
            $errors[] = "Login może zawierać tylko litery i cyfry.";
        }

        // Check if passwords match
        if ($password !== $passwordReturn) {
            $errors[] = "Powtórzone hasło nie zgadza się z oryginalnym hasłem.";
        }

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Check if login already exists in the database
        $check_login_query = "SELECT * FROM Uzytkownicy WHERE Login = ?";
        $stmt = $conn->prepare($check_login_query);
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors[] = "Login '$login' już istnieje. Proszę wybrać inny login.";
        }

        // Proceed with registration if no errors
        if (empty($errors)) {
            // Retrieve the next available Id
            $query = "SELECT MAX(Id) AS max_id FROM Uzytkownicy";
            $result = $conn->query($query);
            
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $next_id = $row['max_id'] + 1;
            } else {
                $next_id = 1; // If no users yet, start from 1
            }

            // Insert user data into the database
            $insert_query = "INSERT INTO Uzytkownicy (Id, Login, Haslo, Imie, Nazwisko, RodzajUzytkownika) 
                             VALUES (?, ?, ?, ?, ?, 'Uczen')";
            
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("issss", $next_id, $login, $passwordHash, $firstName, $lastName);

            if ($stmt->execute()) {
                // Redirect user to mainUczen.php upon successful registration
                header("Location: mainUczen.php");
                exit;
            } else {
                $errors[] = "Błąd podczas dodawania użytkownika do bazy danych: " . htmlspecialchars($stmt->error);
            }
        }

        // Close prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
    
    <script>
    $(document).ready(function() {
        $('.show-hide-password').on('click', function() {
            console.log("Kliknięto przycisk pokazania/ukrycia hasła");

            var passwordInput = $(this).siblings('input');
            console.log("Znaleziono pole hasła:", passwordInput);
            
            var passwordFieldType = passwordInput.attr('type');
            console.log("Aktualny typ pola:", passwordFieldType);

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                $(this).text('👁️'); // Zmienia ikonę na zamkniętą kłódkę
            } else {
                passwordInput.attr('type', 'password');
                $(this).text('🔒'); // Zmienia ikonę na oko
            }
        });
    });
    </script>
</body>
</html>
