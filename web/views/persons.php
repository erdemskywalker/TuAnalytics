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
        <div class="header">
            <h2>KISILER</h2>
            <i onclick="window.location='addperson'" class="fa-solid fa-plus"></i>
        </div>
        <div class="cardBox">

        <?php
foreach ($rows as $row) {
    $imgPath = '../img/'.$row["id"].'.png'; 
    $type = pathinfo($imgPath, PATHINFO_EXTENSION);
    $data = file_get_contents($imgPath);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo '<div onclick="window.location='."'person/".$row["id"]."'".'" class="person_card">';
    echo '<img src="'.$base64.'">';
    echo '<button>'.$row["person_name"].'</button>';
    echo '</div>';
}
?>
           
        </div>
    </div>

</body>

</html>