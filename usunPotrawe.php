<?php
session_start();

// Wczytanie pliku z połączeniem do bazy danych
include 'config.php';

// Zainicjowanie zmiennych na potrawy i błędy
$dishes = [];
$delete_error = "";
$success_message = "";
$delete_confirm = false;
$dish_id_to_delete = "";

// Pobranie listy wszystkich potraw z bazy danych
$sql = "SELECT Id, Nazwa FROM Potrawy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }
}

// Sprawdzenie czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_confirm"])) {
        // Pracownik potwierdził usunięcie potrawy
        if ($_POST["delete_confirm"] == "yes" && isset($_SESSION['dishIdToDelete'])) {
            // Usunięcie potrawy z bazy danych
            $delete_query = "DELETE FROM Potrawy WHERE Id = ?";
            $stmt_delete = $conn->prepare($delete_query);
            $stmt_delete->bind_param("i", $_SESSION['dishIdToDelete']);
            if ($stmt_delete->execute()) {
                unset($_SESSION['dishIdToDelete']);
                $success_message = "Potrawa została pomyślnie usunięta.";
            } else {
                $delete_error = "Błąd podczas usuwania potrawy.";
            }
            $stmt_delete->close();
        } else {
            unset($_SESSION['dishIdToDelete']);
        }
    } else {
        // Pobranie id potrawy do usunięcia
        $dish_id_to_delete = $_POST["dish"];
        $_SESSION['dishIdToDelete'] = $dish_id_to_delete;
        $delete_confirm = true;
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

    <div class="container">
        <h2>Usuwanie potrawy z bazy</h2>

        <?php if (!empty($delete_error)): ?>
            <div class="error-message">
                <p><?php echo $delete_error; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <div class="success-message">
                <p><?php echo $success_message; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($delete_confirm): ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <p>Czy napewno chcesz usunąć tę potrawę?</p>
                <button type="submit" name="delete_confirm" value="yes">Tak</button>
                <button type="submit" name="delete_confirm" value="no">Nie</button>
            </form>
        <?php else: ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="dish">Wybierz potrawę do usunięcia:</label>
                <select id="dish" name="dish" required>
                <option value=""></option>
                    <?php foreach ($dishes as $dish): ?>
                        <option value="<?php echo $dish['Id']; ?>"><?php echo htmlspecialchars($dish['Nazwa']); ?></option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">Usuń potrawę</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
