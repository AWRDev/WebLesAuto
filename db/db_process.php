<?php

function dd($data)
{
    echo "<pre>", var_dump($data), "</pre>";    
}

$dbHost = "127.0.0.1";
$dbName = "tireCenter";
$dbUser = "root";
$dbPassword = "";

$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
mysqli_set_charset($link, "utf8")
?>