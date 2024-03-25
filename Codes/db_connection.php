<?php
$host = "localhost";
$username = "u-230064687";
$password = "UfWsjkbw4Ux0G1u";
$dbname = "u_230064687_db";


$conn = mysqli_connect($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>