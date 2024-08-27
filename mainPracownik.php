<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] != 'PracownikKuchni') {
    header('Location: mainLogowanie.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Jadłospis" />
    <title>Jadłospis</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="styles.css" rel="stylesheet" />
</head>
<body>
    <!--STRONA DLA PRACOWNIKA KUCHNI -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Sprawdź co dobrego przygotowaliśmy dla Ciebie w tym tygodniu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="">Konto pracownika</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Jadłospis</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Konto</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="mainLogowanie.php">Wyloguj</a></li>
                            <li><a class="dropdown-item" href="zmianaDanychPracownik.php">Zmień hasło</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="formularzJadlospis.php">Edytuj jadłospis</a></li>
                            <li><a class="dropdown-item" href="raport.php">Raport</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="formularzDodajPotrawe.php">Dodaj potrawę</a></li>
                            <li><a class="dropdown-item" href="usunPotrawe.php">Usuń potrawę</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <div class="content">
        <div class="container">
            <div class="text-center mt-5">
                <h1>Jadłospis na najbliższy tydzień</h1>
                <p></p>
                <table>
                    <tr>
                        <th>Dzień tygodnia</th>
                        <th>Zupa</th>
                        <th>Drugie danie</th>
                        <th>Napój</th>
                        <th>Deser</th>
                    </tr>
                    <?php
                    // PHP code to fetch and display data from Jadlospis table
                    include 'config.php';

                    // Array to store days of the week in Polish
                    $days_of_week = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek');

                    // Query to fetch data from Jadlospis for each day of the week
                    foreach ($days_of_week as $day) {
                        $sql = "SELECT Zupa, DrugieDanie, Napoj, Deser FROM Jadlospis WHERE DzienTygodnia = '$day'";
                        $result = $conn->query($sql);

                        // Check if there is a row returned
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<tr>';
                            echo '<th>' . $day . '</th>';
                            echo '<td>' . $row['Zupa'] . '</td>';
                            echo '<td>' . $row['DrugieDanie'] . '</td>';
                            echo '<td>' . $row['Napoj'] . '</td>';
                            echo '<td>' . $row['Deser'] . '</td>';
                            echo '</tr>';
                        } else {
                            // If no data found for the day, display empty cells
                            echo '<tr>';
                            echo '<th>' . $day . '</th>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '<td></td>';
                        }
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
    <footer>
        <p>&copy; Jadłospis Szkoły Podstawowej nr.1 w Łodzi im. Marii Skłodowskiej-Curie.</p>
    </footer>
</body>
</html>
