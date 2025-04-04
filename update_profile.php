<?php
$servername = "localhost";
$username = "root";
$password = "Abhi@sql123";
$dbname = "user_dm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$membership_year = $_POST['membership_year'];

$sql = "UPDATE users SET name='$name', email='$email', membership_year='$membership_year' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . $conn->error;
}

$conn->close();
?>
