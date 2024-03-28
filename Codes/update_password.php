<?php
session_start();
include 'db_connection.php'; // Ensure this file sets up the $conn object correctly

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Ensure the file extension matches your login page
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE user SET Password=? WHERE UserID=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $hashedPassword, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
