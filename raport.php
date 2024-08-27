<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Statystyki Potraw</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="formularze.css" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


    <div class="container">
        <h2>Statystyki Potraw</h2>

        <?php
        // Połączenie z bazą danych
        include 'config.php';

        // Średnia ocena dla każdej potrawy
        $sql_avg = "SELECT NazwaPotrawy, AVG(Ocena) AS SredniaOcena FROM Komentarze GROUP BY NazwaPotrawy";
        $result_avg = $conn->query($sql_avg);

        $potrawy = [];
        $srednieOceny = [];

        if ($result_avg->num_rows > 0) {
            while ($row = $result_avg->fetch_assoc()) {
                $potrawy[] = $row['NazwaPotrawy'];
                $srednieOceny[] = number_format($row['SredniaOcena'], 2);
            }
        }

        // Najczęściej oceniana potrawa
        $sql_most_reviewed = "SELECT NazwaPotrawy, COUNT(*) AS LiczbaOcen FROM Komentarze GROUP BY NazwaPotrawy ORDER BY LiczbaOcen DESC LIMIT 1";
        $result_most_reviewed = $conn->query($sql_most_reviewed);
        $most_reviewed = $result_most_reviewed->fetch_assoc();

        // Najlepiej oceniana potrawa
        $sql_best_rated = "SELECT NazwaPotrawy, AVG(Ocena) AS SredniaOcena FROM Komentarze GROUP BY NazwaPotrawy ORDER BY SredniaOcena DESC LIMIT 1";
        $result_best_rated = $conn->query($sql_best_rated);
        $best_rated = $result_best_rated->fetch_assoc();

        // Najgorzej oceniana potrawa
        $sql_worst_rated = "SELECT NazwaPotrawy, AVG(Ocena) AS SredniaOcena FROM Komentarze GROUP BY NazwaPotrawy ORDER BY SredniaOcena ASC LIMIT 1";
        $result_worst_rated = $conn->query($sql_worst_rated);
        $worst_rated = $result_worst_rated->fetch_assoc();

        // Suma wszystkich opinii
        $sql_total_reviews = "SELECT COUNT(*) AS TotalReviews FROM Komentarze";
        $result_total_reviews = $conn->query($sql_total_reviews);
        $total_reviews = $result_total_reviews->fetch_assoc();

        // Zamknięcie połączenia z bazą danych
        $conn->close();
        ?>

        <h3>Średnia ocena dla każdej potrawy</h3>
        <canvas id="averageRatingChart" width="400" height="200"></canvas>

        <script>
            var ctx = document.getElementById('averageRatingChart').getContext('2d');
            var averageRatingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($potrawy); ?>,
                    datasets: [{
                        label: 'Średnia Ocena',
                        data: <?php echo json_encode($srednieOceny); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5
                        }
                    }
                }
            });
        </script>

        <h3>Najczęściej oceniana potrawa</h3>
        <p><?php echo $most_reviewed['NazwaPotrawy']; ?> (<?php echo $most_reviewed['LiczbaOcen']; ?> ocen)</p>

        <h3>Najlepiej oceniana potrawa</h3>
        <p><?php echo $best_rated['NazwaPotrawy']; ?> (średnia ocena: <?php echo number_format($best_rated['SredniaOcena'], 2); ?>)</p>

        <h3>Najgorzej oceniana potrawa</h3>
        <p><?php echo $worst_rated['NazwaPotrawy']; ?> (średnia ocena: <?php echo number_format($worst_rated['SredniaOcena'], 2); ?>)</p>

        <h3>Suma wszystkich opinii</h3>
        <p><?php echo $total_reviews['TotalReviews']; ?> opinii</p>

        <footer>
            <p>&copy; Jadłospis Szkoły Podstawowej nr. 1 w Łodzi im. Marii Skłodowskiej-Curie.</p>
        </footer>
    </div>
</body>
</html>
