<?php
// Include database connection
include 'db_connection.php';

// Get the search query from the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// SQL to search products by name or category
$sql = "SELECT * FROM products WHERE (product_name LIKE ? OR category LIKE ?) AND active = 'yes'";
$stmt = $conn->prepare($sql);
$searchTerm = '%' . $query . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are results
if ($result && $result->num_rows > 0) {
    echo '<div class="product-container">';
    while ($row = $result->fetch_assoc()) {
        // Display each product as in the index page
        echo '<a href="product_details.php?id=' . $row['product_id'] . '">';
        echo '<div class="product">';
        echo '<img src="' . $row['product_image'] . '" alt="' . $row['product_name'] . '">';
        echo '<p class="product-name">' . $row['product_name'] . '</p>';
        echo '<p class="product-price">' . $row['price'] . '</p>';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
} else {
    echo "No products found matching your search.";
}

// Close the database connection
$conn->close();
?>
