<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jadłospis</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="formularze.css" rel="stylesheet">
</head>
<body>


    <div class="container">
        <h2>Podziel sie z nami swoją opinią o naszych potrawach!</h2>

        <form action="#" method="post">
            <label for="potrawa">Wybierz potrawę:</label>
            <select id="potrawa" name="potrawa">
                <option value=""></option>
                <?php
                
                include 'config.php';

                
                $sql = "SELECT Nazwa FROM Potrawy";

                // Wykonanie zapytania
                $result = $conn->query($sql);

                // Sprawdzenie czy zapytanie zwróciło wyniki
                if ($result->num_rows > 0) {
                    // Iteracja po wynikach i wyświetlenie opcji w select
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['Nazwa'] . '">' . $row['Nazwa'] . '</option>';
                    }
                } else {
                    echo '<option value="">Brak potraw do wyboru</option>';
                }

                // Zamknięcie połączenia z bazą danych
                $conn->close();
                ?>
            </select>
            <br><br>

            <label for="komentarz">Dodaj komentarz jeśli chcesz:</label><br>
            <textarea id="komentarz" name="komentarz" rows="4" cols="50"></textarea>
            <br><br>

            <label for="ocena">Wybierz ilość ⭐ :</label>
            <select id="ocena" name="ocena">
                <option value=""></option>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
            <br><br>

            <button type="submit" name="submit">Dodaj</button>
        </form>

        <?php
        // Obsługa formularza po wyborze potrawy
        if (isset($_POST['submit'])) {
            $selected_potrawa = $_POST['potrawa'];
            $komentarz = isset($_POST['komentarz']) ? $_POST['komentarz'] : null; // Pobranie komentarza lub ustawienie na null
            $ocena = $_POST['ocena']; // Pobranie oceny

            if (!empty($selected_potrawa) && !empty($ocena)) {
                // Połączenie z bazą danych
                include 'config.php';


                // Wstawienie danych do tabeli Komentarze
                $sql_insert = "INSERT INTO Komentarze ( NazwaPotrawy, Ocena, Komentarze)
                               VALUES ( '$selected_potrawa', '$ocena', " . ($komentarz ? "'$komentarz'" : "NULL") . ")";

                if ($conn->query($sql_insert) === TRUE) {
                    echo '<p>Dodano komentarz i ocenę do bazy danych.</p>';
                } else {
                    echo '<p>Błąd podczas dodawania komentarza i oceny: ' . $conn->error . '</p>';
                }

                // Zamknięcie połączenia z bazą danych
                $conn->close();
            } else {
                echo '<p>Proszę wybrać potrawę i ocenę.</p>';
            }
        }
        ?>

        <footer>
            <p>&copy; Jadłospis Szkoły Podstawowej nr. 1 w Łodzi im. Marii Skłodowskiej-Curie.</p>
        </footer>
    </div>
</body>
</html>