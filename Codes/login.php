<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $servername = "localhost"; 
  $dbUser = "u-230064687";      
  $dbPassword = "UfWsjkbw4Ux0G1u";          
  $dbName = "u_230064687_db";

  try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM Users WHERE email = :email AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();

    if ($statement->rowCount() === 1) {
      // Successful sign-in
      echo '<script>
              swal("Success", "You have successfully signed in", "success")
                  .then(function () {
                      window.location.href = "index.html";
                  });
            </script>';
    } else {
      // Invalid credentials
      echo '<script>
              swal("Error", "Invalid email or password", "error");
            </script>';
    }

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>
