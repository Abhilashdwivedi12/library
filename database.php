<?php

$host = "localhost"; 
$username = "root"; 
$password = "Abhi@sql123"; 
$dbname = "lib"; 

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





?>

