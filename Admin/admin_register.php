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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $ticket_id = htmlspecialchars($_POST['ticket_id']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $designation = $_POST['designation'];

   
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }
    
    $role = ($designation == 'RM') ? 'RM' : 'DEV';
    
    $query = "INSERT INTO users (name, ticket_id, email, phone, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $name, $ticket_id, $email, $phone, $password, $role);

    
    if ($stmt->execute()) {
        echo "Registration successful.";
        header('Location: login.html');
    } else {
        echo "Registration failed: " . $stmt->error;
    }
    
    
    $stmt->close();
    $conn->close();
}
?>
