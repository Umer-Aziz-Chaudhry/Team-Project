<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $confirmEmail = $_POST["confirmEmail"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $phone = $_POST["phone"];
    $userType = $_POST["userType"];

    // Validate form data
    if ($email !== $confirmEmail) {
        echo "<script>swal('Error', 'Emails do not match', 'error').then(() => window.location.href='signup.php');</script>";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "<script>swal('Error', 'Passwords do not match', 'error').then(() => window.location.href='signup.php');</script>";
        exit;
    }

    // Connect to the database
    $host = "localhost";
    $username = "u-230064687@localhost";
    $password = "UfWsjkbw4Ux0G1u";
    $database = "u_230064687_db";

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO Users (email, password, first_name, last_name, user_type, phone_number)
            VALUES ('$email', '$password', '$firstName', '$lastName', '$userType', '$phone')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful, redirect to payment page
        echo "<script>swal('Success', 'Registration Successful', 'success').then(() => window.location.href='payment.html');</script>";
    } else {
        // Error occurred while inserting into the database
        echo "<script>swal('Error', 'An error occurred', 'error').then(() => window.location.href='signup.php');</script>";
    }

    mysqli_close($conn);
}
?>
