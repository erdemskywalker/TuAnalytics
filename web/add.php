<?php

$db = new PDO("sqlite:../TuAnalytics.db");

if ($_POST) {
    $person_name = htmlspecialchars($_POST["name"]);
    $deadline = htmlspecialchars($_POST["datetime"]);
    $imageData = isset($_POST["photoData"]) ? $_POST["photoData"] : null;

    $query = $db->prepare("INSERT INTO persons (person_name, deadline) VALUES (:person_name, :deadline)");
    $query->bindValue(":person_name", $person_name);
    $query->bindValue(":deadline", $deadline);
    $query->execute();

    $lastId = $db->lastInsertId();

    if ($imageData) {
        $image_parts = explode(";base64,", $imageData);
        if (count($image_parts) == 2) {
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = "../img/" . $lastId . ".png";
            file_put_contents($fileName, $image_base64);
        }
    }

    if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["fileInput"]["tmp_name"];
        $fileName = "../img/" . $lastId . ".png";
        move_uploaded_file($tmp_name, $fileName);
    }
}

header("location:./")



?>
