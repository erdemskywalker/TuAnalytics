
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
    <link rel="stylesheet" href="style.css">
    <style>
        .content{
            display: flex;
            align-items: c;
            flex-direction: column;
        }
        .table{
            align-self: center;
            width: 80%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background-color: #FFFFFF;
            color: black;
            border-radius: 22px;
            height: 50px;
        }
    </style>
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