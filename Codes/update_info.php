<?php
session_start();
include 'db_connection.php'; // This file must correctly set up the $conn object

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Match the file extension to your login page
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

    $query = "UPDATE user SET FirstName=?, LastName=?, Email=?, Phone=? WHERE UserID=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $phone, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
