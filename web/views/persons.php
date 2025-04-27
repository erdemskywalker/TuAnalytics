<?php
$db=new PDO("sqlite:../TuAnalytics.db");

$query=$db->prepare("SELECT * FROM persons");
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
            <div>
                <button onclick="window.location='persons'" type="button" class="btn btn-primary">persons</button>
                <button onclick="window.location='addperson'" type="button" class="btn btn-primary">add persons</button>
                <button onclick="window.location='logs'" type="button" class="btn btn-primary">logs</button>
            </div>
        </div>
    </nav>

    <div class="container content">
        <h2>PERSONS</h2>
        <div class="cardbox">
        <?php
foreach ($rows as $row) {
    $imgPath = '../img/'.$row["id"].'.png'; 
    $type = pathinfo($imgPath, PATHINFO_EXTENSION);
    $data = file_get_contents($imgPath);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo '<div class="card">';
    echo '<img src="'.$base64.'">';
    echo '<h2>'.$row["person_name"].'</h2>';
    echo '<p>'.$row["deadline"].'</p>';
    echo '</div>';
}
?>

        </div>

    </div>

</body>

</html>