<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check if the product ID is valid
    $statement = $pdo->prepare("SELECT * FROM products WHERE product_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    if($total == 0) {
        header('location: logout.php');
        exit;
    }
}

// Proceed with the deletion process

// Deleting the featured image of the product from the server
$statement = $pdo->prepare("SELECT product_image FROM products WHERE product_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $imagePath = '../media/' . $row['product_image']; // Corrected path assuming your images are in the `media` directory
    if(file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Delete the product from the database
$statement = $pdo->prepare("DELETE FROM products WHERE product_id=?");
$statement->execute(array($_REQUEST['id']));

header('location: product.php');
?>
