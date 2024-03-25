<?php
session_start();
// VerifyUser.php

// Database connection details
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
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// Only proceed if both email and password are provided
if ($email !== null && $password !== null) {
    // Prepare and execute the SQL query
    $query = "SELECT * FROM user WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given email exists
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Password is correct, user is authenticated
            echo "Login successful!";
            header("Location: checkout.html");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid password!";
        }
    } else {
        // User with the given email doesn't exist
        echo "User not found!";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Email or Password is not set";
}
?>
