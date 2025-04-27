<?php

$tuebtu_default_host = 'localhost'; 
$tuebtu_default_dbname = 'erdem'; 
$tuebtu_default_username = 'root'; 
$tuebtu_default_password = ''; 

$db = new PDO("mysql:host=$tuebtu_default_host;dbname=$tuebtu_default_dbname;charset=utf8", $tuebtu_default_username, $tuebtu_default_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>