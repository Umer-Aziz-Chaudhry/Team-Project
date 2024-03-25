<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check if the id is valid or not in the user table
    $statement = $pdo->prepare("SELECT * FROM user WHERE UserID=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    if($total == 0) {
        header('location: logout.php');
        exit;
    }
}
?>

<?php
    // Delete from user table
    $statement = $pdo->prepare("DELETE FROM user WHERE UserID=?");
    $statement->execute(array($_REQUEST['id']));

    header('location: customer.php');
?>
