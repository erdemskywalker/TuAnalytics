<?php

header('Content-Type: application/json');


$command = '..\myenv\Scripts\python.exe personscanning.py';
$result = shell_exec($command);
$data = json_decode($result, true);


echo $data;



?>