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

    if ($email !== $confirmEmail || $password !== $confirmPassword) {
        echo "<script>alert('Error: Registration failed'); window.location.href='signup.php';</script>";
        exit;
    }

    $host = "localhost";
    $username = "u-230064687";
    $password = "UfWsjkbw4Ux0G1u";
    $dbname = "u_230064687_db";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (FirstName, LastName, Email, Password, Phone)
                VALUES (:firstName, :lastName, :email, :hashedPassword, :phone)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();

        // Registration successful, redirect to login page
        echo "<script>alert('Success: Registration Successful. You can now login to account. '); window.location.href='login.html';</script>";
        exit;
    } catch (PDOException $ex) {
        // Error occurred while inserting into the database
        echo "<script>alert('Error: An error occurred'); window.location.href='signup.php';</script>";
        exit;
    } finally {
        // Close the database connection
        $conn = null;
    }
}
?>
