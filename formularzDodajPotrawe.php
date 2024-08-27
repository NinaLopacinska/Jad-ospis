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
        <h2>Dodaj nową potrawę do bazy</h2>        
        <?php
        // Include the database connection file
        session_start();
        include 'config.php';

        $errors = [];

        // Process form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nazwa = $_POST['Nazwa'];
            $rodzajPosilku = $_POST['rodzajPosilku'];
            $dieta = $_POST['select'];

            // Validate inputs
            if (empty($nazwa)) {
                $errors[] = "Nazwa potrawy jest wymagana.";
            }
            if (empty($rodzajPosilku)) {
                $errors[] = "Rodzaj posiłku jest wymagany.";
            }
            if (empty($dieta)) {
                $errors[] = "Dieta jest wymagana.";
            }

            // Insert into database if no errors
            if (empty($errors)) {
                // Retrieve the last inserted id to increment
                $query = "SELECT MAX(Id) AS max_id FROM Potrawy";
                $result = $conn->query($query);
                
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $next_id = $row['max_id'] + 1;
                } else {
                    $next_id = 1; // If no records yet, start from 1
                }

                // Insert into database
                $sql = "INSERT INTO Potrawy (Id, Nazwa, RodzajPosilku, Dieta) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isss", $next_id, $nazwa, $rodzajPosilku, $dieta);

                if ($stmt->execute()) {
                    echo "<p class='alert alert-success'>Potrawa została dodana pomyślnie.</p>";
                } else {
                    echo "<p class='alert alert-danger'>Błąd: " . $stmt->error . "</p>";
                }

                $stmt->close();
            } else {
                // Display validation errors
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <h4 for="Nazwa">Nazwa</h4> 
                <input id="Nazwa" name="Nazwa" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
                <h4>Rodzaj posiłku</h4>
                <div class="form-check form-check-inline">
                    <label for="zupa" class="form-check-label">Zupa</label>
                    <input type="radio" id="zupa" name="rodzajPosilku" value="Zupa" required="required" class="form-check-input">
                    
                    <label for="drugieDanie" class="form-check-label">Drugie danie</label>
                    <input type="radio" id="drugieeDanie" name="rodzajPosilku" value="Drugie danie" required="required" class="form-check-input">
    
                    <label for="napoj" class="form-check-label">Napój</label>
                    <input type="radio" id="napoj" name="rodzajPosilku" value="Napój" required="required" class="form-check-input">
    
                    <label for="deser" class="form-check-label">Deser</label>
                    <input type="radio" id="deser" name="rodzajPosilku" value="Deser" required="required" class="form-check-input">
                </div>
                <h4 for="select">Dieta</h4> 
                <select id="select" name="select" class="custom-select" required="required">
                    <option value="">Wybierz dietę</option> 
                    <option value="Mięsna">Mięsna</option>
                    <option value="Wegetariańska">Wegetariańska</option>
                    <option value="Wegańska">Wegańska</option>
                    <option value="Bezglutenowa">Bezglutenowa</option>
                </select>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </form>
        <footer>
            <p>&copy; Jadłospis Szkoły Podstawowej nr. 1 w Łodzi im. Marii Skłodowskiej-Curie.</p>
        </footer>
    </div>
</body>
</html>
