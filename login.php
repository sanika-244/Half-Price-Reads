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

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM userr WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: homepage.html");
    exit();
} else {
    echo "Invalid email or password.";
}

$stmt->close();
$conn->close();
?>
