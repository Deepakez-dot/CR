<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "databasekanaam";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ticket_id = $_POST['ticket_id'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, phone, email, ticket_id, password, role) VALUES (?, ?, ?, ?, ?, 'raiser')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $email, $ticket_id, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
