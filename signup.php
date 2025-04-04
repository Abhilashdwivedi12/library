<?php

$host = "localhost"; 
$username = "root"; 
$password = "Abhi@sql123"; 
$dbname = "user_dm"; 

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $status = $_POST['status'];


    $query = "INSERT INTO users (id, name, username, password, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issss", $id, $name, $username, $password, $status);

    if ($stmt->execute()) {
        echo "Signup successful! <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}

$conn->close();
?>