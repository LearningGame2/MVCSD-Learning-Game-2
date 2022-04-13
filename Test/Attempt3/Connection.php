<?php
$dbServer = 'localhost';
$dbUsername = 'fishell1';
$dbPassword = 'S219352';
$dbName = 'Game2';

$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword,$dbName);
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
?>