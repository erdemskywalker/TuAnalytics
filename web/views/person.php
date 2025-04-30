
<?php
$db=new PDO("sqlite:../TuAnalytics.db");

$query=$db->prepare("SELECT * FROM persons WHERE id=:id");
$query->bindParam(":id",$data[0]);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);


$imgPath = '../img/'.$row["id"].'.png'; 
$type = pathinfo($imgPath, PATHINFO_EXTENSION);
$data = file_get_contents($imgPath);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="../extras/bootstrap.min.css">
    <script src="../extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../extras/style.css">
    <link rel="stylesheet" href="../extras/fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
            <i onclick="window.location='logout.php';"  class="fa-regular fa-circle-user"></i>
        </div>
    </nav>

    <div class="container content_two">
        <div class="header">
            <i onclick="window.location='./'" style="background: none;font-size: 40px;" class="fa-regular fa-circle-xmark"></i>
        </div>
        <div class="centerBox">
            <img src="<?php echo $base64;?>" alt="">
        </div>
        <div class="nameBox">
            <h2><?php echo $row["person_name"]?></h2>
            <p>@erdemskywalker</p>
        </div>
        <button type="button" class="btn btn-danger">Bu Kişiyi Sil</button>
    </div>

</body>

</html>