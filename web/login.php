<?php

session_start();

if ($_POST) {
    $admin_login_name = $_POST["admin_login_name"];
    $admin_login_password = $_POST["admin_login_password"];


    if ($admin_login_name=="admin"&&$admin_login_password=="admin") {
        $_SESSION["user"] = "yes";
    } else {
    }
} else {

}
header("location:./");


?>