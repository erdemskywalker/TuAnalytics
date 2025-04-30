
<?php
$db=new PDO("sqlite:../TuAnalytics.db");

$query=$db->prepare("SELECT * FROM logs");
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="extras/bootstrap.min.css">
    <script src="extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
            <div>
            <i onclick="window.location='logs';" class="fa-solid fa-clock-rotate-left"></i>
            <i onclick="window.location='logout.php';" class="fa-solid fa-arrow-right-from-bracket"></i>
            </div>
        </div>
    </nav>

    <div class="container content_two">
        <h2>LOGS</h2>
            <div class="table" style="background-color:#3E4D88; color:white;">
                <p>#</p>
                <p>Person</p>
                <p>Date</p>
            </div>
            <?php
foreach ($rows as $row) {
    echo '<div class="table">';
    echo '<p>'.$row["id"].'</p>';
    echo '<p>'.$row["person"].'</p>';
    echo '<p>'.$row["date"].'</p>';
    echo '</div>';
}
?>

    </div>

</body>

</html>