<?php
// Database connection
$host = "127.0.0.1";
$port = 3307; // your custom port
$user = "root";
$password = "";
$dbname = "userlog";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$book_title = $_POST['title'];
$book_price = $_POST['price'];
$book_author = $_POST['author'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$note = $_POST['note'];

// Insert into DB
$sql = "INSERT INTO book_orders ( name, email, address, phone, note)
        VALUES ( ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sdssssss", $name, $email, $address, $phone, $note);

if ($stmt->execute()) {
    echo "Order successfully saved!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
