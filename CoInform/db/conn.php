<?php

$host     = 'localhost';
$dbName   = 'coinform';
$userName = 'root';
$password = '';


$link = mysqli_connect($host, $userName, $password, $dbName);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>