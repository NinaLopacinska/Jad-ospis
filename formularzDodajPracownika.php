<?php
session_start();
include 'config.php';

$errors = []; // Array to store validation errors
$success_message = ''; // Variable to store success message

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $passwordReturn = $_POST["passwordReturn"];

    // Validate and sanitize input (you should implement proper validation)
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $login = htmlspecialchars($login);

    // Check if passwords match
    if ($password !== $passwordReturn) {
        $errors[] = "Powtórzone hasło nie zgadza się z oryginalnym hasłem.";
    }

    // Check if login already exists in the database
    $check_login_query = "SELECT * FROM Uzytkownicy WHERE Login = '$login'";
    $result = $conn->query($check_login_query);
    
    if ($result && $result->num_rows > 0) {
        $errors[] = "Login '$login' już istnieje. Proszę wybrać inny login.";
    }

    // Proceed with registration if no errors
    if (empty($errors)) {
        // Retrieve the last inserted id to increment
        $query = "SELECT MAX(Id) AS max_id FROM Uzytkownicy";
        $result = $conn->query($query);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $next_id = $row['max_id'] + 1;
        } else {
            $next_id = 1; // If no users yet, start from 1
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $insert_query = "INSERT INTO Uzytkownicy (Id, Login, Haslo, Imie, Nazwisko, RodzajUzytkownika) 
                         VALUES ('$next_id', '$login', '$hashed_password', '$firstName', '$lastName', 'PracownikKuchni')";

        if ($conn->query($insert_query) === TRUE) {
            // Set success message
            $success_message = "Użytkownik '$login' został pomyślnie dodany.";

            // Clear form data
            $_POST = array();

            // Optional: You can redirect after a few seconds if desired
            // header("refresh:3;url=mainUczen.php");
        } else {
            $errors[] = "Błąd podczas dodawania użytkownika do bazy danych: " . $conn->error;
        }
    }
}

// Close the database connection
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<a href="mainAdministrator.php" class="home-link">⌂</a>
    <div class="container">
        <h2>Dodaj nowego pracownika</h2>
        <?php if (!empty($success_message)): ?>
            <div class="success-message">
                <p><?php echo $success_message; ?></p>
            </div>
        <?php endif; ?>
        <form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="firstName">Imię:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>" required>

            <label for="lastName">Nazwisko:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>" required>

            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>" required>

            <label for="password">Hasło:<span class="show-hide-password" role="img" aria-label="Pokaż hasło">👁️</span></label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
            </div>

            <label for="passwordReturn">Powtórz hasło: <span class="show-hide-password" role="img" aria-label="Pokaż hasło">👁️</span></label>
            <div class="password-container">
                <input type="password" id="passwordReturn" name="passwordReturn" required>
            </div>

            <?php
            // Display validation errors if there are any
            if (!empty($errors)) {
                echo '<div class="error-message">';
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
            }
            ?>

            <button type="submit" class="button">Dodaj</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.show-hide-password').on('click', function() {
                var passwordInput = $(this).parent().next('div.password-container').find('input');
                var passwordFieldType = passwordInput.attr('type');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $(this).text('🔒');
                } else {
                    passwordInput.attr('type', 'password');
                    $(this).text('👁️');
                }
            });
        });
    </script>
</body>
</html>
