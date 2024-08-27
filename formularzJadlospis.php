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
        <h2>Stwórz jadłospis</h2>  
        
        <form action="#" method="post">
            <label for="dzien">Wybierz dzień tygodnia:</label>
            <select id="dzien" name="dzien">
                <option value=""></option>
                <?php
                // PHP code for fetching days of the week
                session_start();
                include 'config.php';

                // Query to fetch distinct days of the week from Jadlospis table
                $sql_days = "SELECT DISTINCT DzienTygodnia FROM Jadlospis";
                $result_days = $conn->query($sql_days);

                // Check if there are rows returned
                if ($result_days->num_rows > 0) {
                    while($row_day = $result_days->fetch_assoc()) {
                        // Output each option inside the select element
                        echo '<option value="' . $row_day['DzienTygodnia'] . '">' . $row_day['DzienTygodnia'] . '</option>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <br><br>

            <label for="zupa">Wybierz zupę:</label>
            <select id="zupa" name="zupa">
                <option value=""></option>
                <?php
                // PHP code for fetching soups from Potrawy table
                include 'config.php';

                // Query to fetch soups from Potrawy table
                $sql_soup = "SELECT Nazwa FROM Potrawy WHERE RodzajPosilku = 'Zupa'";
                $result_soup = $conn->query($sql_soup);

                // Check if there are rows returned
                if ($result_soup->num_rows > 0) {
                    while($row_soup = $result_soup->fetch_assoc()) {
                        // Output each option inside the select element
                        echo '<option value="' . $row_soup['Nazwa'] . '">' . $row_soup['Nazwa'] . '</option>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <br><br>

            <label for="drugie-danie">Wybierz drugie danie:</label>
            <select id="drugie-danie" name="drugie-danie">
                <option value=""></option>
                <?php
                // PHP code for fetching main courses from Potrawy table
                include 'config.php';

                // Query to fetch main courses from Potrawy table
                $sql_main_course = "SELECT Nazwa FROM Potrawy WHERE RodzajPosilku = 'Drugie danie'";
                $result_main_course = $conn->query($sql_main_course);

                // Check if there are rows returned
                if ($result_main_course->num_rows > 0) {
                    while($row_main_course = $result_main_course->fetch_assoc()) {
                        // Output each option inside the select element
                        echo '<option value="' . $row_main_course['Nazwa'] . '">' . $row_main_course['Nazwa'] . '</option>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <br><br>

            <label for="napoj">Wybierz napój:</label>
            <select id="napoj" name="napoj">
                <option value=""></option>
                <?php
                // PHP code for fetching drinks from Potrawy table
                include 'config.php';

                // Query to fetch drinks from Potrawy table
                $sql_drink = "SELECT Nazwa FROM Potrawy WHERE RodzajPosilku = 'Napoj'";
                $result_drink = $conn->query($sql_drink);

                // Check if there are rows returned
                if ($result_drink->num_rows > 0) {
                    while($row_drink = $result_drink->fetch_assoc()) {
                        // Output each option inside the select element
                        echo '<option value="' . $row_drink['Nazwa'] . '">' . $row_drink['Nazwa'] . '</option>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <br><br>

            <label for="deser">Wybierz deser:</label>
            <select id="deser" name="deser">
                <option value=""></option>
                <?php
                // PHP code for fetching desserts from Potrawy table
                include 'config.php';

                // Query to fetch desserts from Potrawy table
                $sql_dessert = "SELECT Nazwa FROM Potrawy WHERE RodzajPosilku = 'Deser'";
                $result_dessert = $conn->query($sql_dessert);

                // Check if there are rows returned
                if ($result_dessert->num_rows > 0) {
                    while($row_dessert = $result_dessert->fetch_assoc()) {
                        // Output each option inside the select element
                        echo '<option value="' . $row_dessert['Nazwa'] . '">' . $row_dessert['Nazwa'] . '</option>';
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <br><br>

            <button type="submit" name="submit">Dodaj</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Jeśli formularz został przesłany, pobieramy dane
            $dzien = $_POST['dzien'];
            $zupa = $_POST['zupa'];
            $drugie_danie = $_POST['drugie-danie'];
            $napoj = $_POST['napoj'];
            $deser = $_POST['deser'];

            // Sprawdzenie czy wszystkie pola zostały wybrane
            if ($dzien && $zupa && $drugie_danie && $napoj && $deser) {
                // Połączenie z bazą danych
                include 'config.php';

                // Sprawdzenie czy wybrany dzień tygodnia istnieje w tabeli Jadlospis
                $sql_check_day = "SELECT * FROM Jadlospis WHERE DzienTygodnia = '$dzien'";
                $result_check_day = $conn->query($sql_check_day);

                if ($result_check_day->num_rows > 0) {
                    // Aktualizacja rekordu w Jadlospis
                    $sql_update = "UPDATE Jadlospis SET Zupa = '$zupa', DrugieDanie = '$drugie_danie', Napoj = '$napoj', Deser = '$deser' WHERE DzienTygodnia = '$dzien'";
                    if ($conn->query($sql_update) === TRUE) {
                        echo '<p>Dane zostały zaktualizowane dla dnia ' . $dzien . '.</p>';
                    } else {
                        echo '<p>Błąd aktualizacji danych: ' . $conn->error . '</p>';
                    }
                } else {
                    // Wstawienie nowego rekordu do Jadlospis
                    $sql_insert = "INSERT INTO Jadlospis (DzienTygodnia, Zupa, DrugieDanie, Napoj, Deser) VALUES ('$dzien', '$zupa', '$drugie_danie', '$napoj', '$deser')";
                    if ($conn->query($sql_insert) === TRUE) {
                        echo '<p>Dane zostały dodane dla dnia ' . $dzien . '.</p>';
                    } else {
                        echo '<p>Błąd dodawania danych: ' . $conn->error . '</p>';
                    }
                }

                // Zamknięcie połączenia z bazą danych
                $conn->close();
            } else {
                echo '<p>Proszę wybrać wszystkie dania.</p>';
            }
        }
        ?>

        <footer>
            <p>&copy; Jadłospis Szkoły Podstawowej nr. 1 w Łodzi im. Marii Skłodowskiej-Curie.</p>
        </footer>
    </div>
</body>
</html>
