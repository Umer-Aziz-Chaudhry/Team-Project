<?php
// VerifyUser.php

$host = 'localhost';
$username = 'u-230064687';
$password = 'UfWsjkbw4Ux0G1u';
$database = 'u_230064687_db';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "SELECT * FROM user WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['Password'])) {
        echo "Login successful!";
    } else {
        // Password is incorrect
        echo "Invalid password!";
    }
} else {
    // User with the given email doesn't exist
    echo "User not found!";
}

$stmt->close();
$conn->close();
?>
