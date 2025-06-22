<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php

$host = "127.0.0.1";
$port = 3307; 
$user = "root";
$password = ""; 
$dbname = "userlog";


$conn = new mysqli($host, $user, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO userr (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
