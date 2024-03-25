<!DOCTYPE html>
<html>
<style>
    .cart-badge {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 4px 8px;
    font-size: 12px;
    position: absolute;
    top: 0;
    right: 0;
}

.cart-notification {
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    margin-top: 10px;
    border-radius: 5px;
    display: inline-block;
    position: relative;
}
#product-options {
    margin-top: 20px;
    padding: 20px;
    background-color: #f9f9f9; /* Light grey background */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Soft shadow for depth */
}

#product-options h3 {
    margin-bottom: 16px;
    color: #333; /* Dark grey color for the text */
    font-size: 20px;
}

#product-options div {
    margin-bottom: 10px;
}

#product-options label {
    font-weight: bold;
    margin-right: 10px;
}

#product-options input[type="number"],
#product-options select {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc; /* Light grey border */
    border-radius: 4px;
    background-color: white;
    width: calc(100% - 100px); /* Adjust width as needed */
}

#product-options input[type="number"] {
    max-width: 60px; /* Adjust width for the quantity input */
}

.fancy-button {
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.fancy-button:hover {
    background-color: #0056b3; /* Darker shade on hover */
}


.fancy-button:not(:last-child) {
    margin-right: 10px;
}
#view-reviews-btn {
    background-color: black; 
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

#view-reviews-btn:hover {
    background-color: rgba(0, 0, 0, 0.312); 
}
.product-display {
    display: flex;
    justify-content: space-between;
    align-items: flex-start; 
}

#slideshow {

    flex: 1; /* Adjust as necessary */
}

.product-actions {
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    margin-left: 20px; /* Adjust as necessary */
    flex-basis: 250px; /* Adjust the width as necessary */
}


</style>
<head>
    <title>Product Details - Mobile Wave</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/227527f8c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="product_details.css">


</head>
<body>

    <div id="header">
        <span id="title" style="font-size: 36px;">
            <img id="logo" src="media/Logo.png" alt="MobileWave" style="height: 90px;">
            &nbsp;&nbsp;MobileWave
        </span>

        <div id="search-bar">
            <input type="text" id="search-input" placeholder="Search...">
            <button type="button" onclick="searchItem()">Search</button>
        </div>


        <!-- Add the wishlist icon and link -->
        <a href="wishlist_page.html" id="wishlist" style="font-size: 18px; text-decoration: none; color: red;">
            <i class="fas fa-heart"></i>
            &nbsp;&nbsp;
        </a>

        <!-- Add the cart icon and link -->
        <a href="Cart.html" id="cart" style="font-size: 18px; text-decoration: none; color: white;">
            <i class="fas fa-shopping-cart"></i>
            &nbsp;&nbsp;
        </a>

        <a href="login.html" id="signin" style="font-size: 18px; text-decoration: none; color: white;">
            <i class="fa-solid fa-right-to-bracket" style="color: white;"></i>
            &nbsp;&nbsp;Sign In / Join Now
        </a>
    </div>
    
    <div id="taskbar">
        <ul>
            <li><a href="index.php" class="nav-link active">Home</a></li>
            <li><a href="AboutsUS.html" class="nav-link">About Us</a></li>
            <li><a href="Catalog.html" class="nav-link">Product Catalog</a></li>
            <li><a href="ContactUs.html" class="nav-link">Contact US</a></li>
            <li><a href="offer/offer.html" class="nav-link">Offers</a></li>
        </ul>
    </div>
            
    <div id="advertisements-container">
        <img src="media/advert1.jpeg" alt="Advertisement 1">
        <img src="media/advert2.jpg" alt="Advertisement 2">
    </div>
     

    <div id="content">
    <div id="product-details-container">
        <?php
            include 'db_connection.php';

            // Check if 'id' is set and is an integer
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
                $productId = $_GET['id'];

                // Prepared statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
                if (!$stmt) {
                    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
                }
                $stmt->bind_param("i", $productId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $productName = $row['product_name'];
                    $productPrice = $row['price'];
                    $productImage = $row['product_image'];
                    $productCategory = $row['category'];
                    $productDescription = $row['description_'];

                    echo "<h2>".htmlspecialchars($productName)."</h2>";

                    echo '<div id="slideshow">';
                    echo '<div class="slide active">';
                    echo "<img src='".htmlspecialchars($productImage)."' alt='".htmlspecialchars($productName)."' style='max-width: 100%; max-height: 400px;'>";
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="product-actions">';
                    echo "<button id=\"view-reviews-btn\" onclick=\"window.location.href='offer/CustomerReview.html'\" class=\"fancy-button\">View Reviews and Ratings</button>";
                    echo '</div>';
                    // echo '</div>';

                    echo "<p>Price: $".htmlspecialchars($productPrice)."</p>";

                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo "<p>".nl2br(htmlspecialchars($productDescription))."</p>";
                    echo '</div>';
                    
          
                    echo '<div id="product-options">';
                    echo '<h3>Customize</h3>';
                    echo '<div>';
                    echo '<label for="product-quantity">Quantity:</label>';
                    echo '<input type="number" id="product-quantity" name="quantity" min="1" value="1">';
                    echo '</div>';
                    echo '<div>';
                    echo '<label for="product-color">Color:</label>';
                    echo '<select id="product-color" name="color">';
                    echo '<option value="black">Black</option>';
                    echo '<option value="white">White</option>';
                    echo '<option value="blue">Blue</option>';

                    echo '</select>';
                    echo '</div>';
                    echo '</div>';


                    echo '<button id="add-to-wishlist" onclick="addToWishlist()" class="fancy-button">Add to Wishlist</button>';
                    echo '<button id="add-to-cart" onclick="addToCart()" class="fancy-button">Add to Cart</button>';

                    // Close statement
                    $stmt->close();
                } else {
                    echo "<h2>Product Not Found</h2>";
                    echo '<p>Price: $0.00</p>';
                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo '<p>No description available.</p>';
                    echo '</div>';
                }
            } else {
                echo "<h2>Invalid Product ID</h2>";
                echo '<p>Price: $0.00</p>';
                echo '<div id="product-description">';
                echo '<h3>Description</h3>';
                echo '<p>No description available.</p>';
                echo '</div>';
            }

            $conn->close();
        ?>
    </div>
</div>



<div id="product-details-container1">
    <?php
    include 'db_connection.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function displayProductsByCategory($category, $currentProductId, $containerId)
    {
        global $conn;
    
        // Corrected the column name from 'id' to 'product_id'
        $sql = "SELECT * FROM products WHERE category = '$category' AND product_id != $currentProductId";
        $result = $conn->query($sql);
    
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="product_details.php?id=' . $row['product_id'] . '">';
                echo '<div class="product" id="product' . $row['product_id'] . '">';
                echo '<img src="' . $row['product_image'] . '" alt="' . $row['product_name'] . '">';
                echo '<p class="product-name">' . $row['product_name'] . '</p>';
                echo '<p class="product-price">' . $row['price'] . '</p>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo "No products found in the specified category.";
        }
    }

    if ($productCategory !== null) {
        echo '<h2 id="related-products-category" class="product-catagory">Related Products</h2>';
        echo '<div class="product-container" id="related-products-container">';
        displayProductsByCategory($productCategory, $productId, 'related-products-container');
        echo '</div>';
    }
    ?>
    </div>
</div>


<footer>
    <div>
            <h4>Follow Us</h4>
            <a href="https://www.youtube.com/channel/UCmxf0BNKQn5jppy4XpfWl8Q">Facebook</a>
            <a href="https://twitter.com/Mobile__Wave">Twitter</a>
            <a href="https://www.instagram.com/mobile___wave/">Instagram</a>
            <a href="https://www.tiktok.com/@mobile__wave">TikTok</a>
            <a href="https://www.youtube.com/channel/UCmxf0BNKQn5jppy4XpfWl8Q">Youtube</a>
        </div>
        <div>
            <h4>Legal</h4>
            <a href="ADVS/privacy.html">Privacy Policy</a>
            <a href="ADVS/terms.html">Terms of Service</a>
            <a href="ADVS/adverties.html">Adversite</a>
        </div>
        <div>
            <h4>Contact Us</h4> 
            <a href="ADVS/faq.html">FAQ</a>
            <a href="ContactUs.html">Contact Us</a>
        </div>
        <div class="copyright">
            <p>&copy; 2023 Mobile Wave. All rights reserved.</p>
        </div>
    </footer>

</body>
<script src="product_details.js"></script>
<script>
    function addToWishlist() {

function addToWishlist() {

    var productName = "<?php echo $productName; ?>";


    var notification = document.createElement('div');
    notification.className = 'wishlist-notification';
    notification.innerHTML = '<i class="fas fa-heart"></i> ' + productName + ' added to Wishlist';

 
    document.getElementById('wishlist').appendChild(notification);

 
    setTimeout(function () {
        notification.remove();
    }, 3000); 
}

var productName = "<?php echo $productName; ?>";
var productPrice = "<?php echo $productPrice; ?>";
var productImage = "<?php echo $productImage; ?>";
var productCategory = "<?php echo $productCategory; ?>";
var productDescription = "<?php echo $productDescription; ?>";


var wishlistItem = {
    name: productName,
    price: productPrice,
    image: productImage,
    category: productCategory,
    description: productDescription
};


var wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];


wishlist.push(wishlistItem);


localStorage.setItem('wishlist', JSON.stringify(wishlist));


var wishlistIcon = document.getElementById('wishlist');
wishlistIcon.innerHTML = '<i class="fas fa-heart"></i>&nbsp;&nbsp;<span class="wishlist-dot"></span>';
}

function addToCart() {

var productName = "<?php echo $productName; ?>";
var productPrice = "<?php echo $productPrice; ?>";
var productImage = "<?php echo $productImage; ?>";
var productCategory = "<?php echo $productCategory; ?>";
var productDescription = "<?php echo $productDescription; ?>";


var cartItem = {
    name: productName,
    price: productPrice,
    image: productImage,
    category: productCategory,
    description: productDescription
};


var cart = JSON.parse(localStorage.getItem('cart')) || [];


cart.push(cartItem);


localStorage.setItem('cart', JSON.stringify(cart));


var cartBadge = document.getElementById('cart');
var cartCount = cart.length;
cartBadge.innerHTML = '<i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;<span class="cart-badge">' + cartCount + '</span>';


var notification = document.createElement('div');
notification.className = 'cart-notification';
notification.innerHTML = '<i class="fas fa-shopping-cart"></i> ' + productName + ' added to Cart';


document.getElementById('cart').appendChild(notification);

setTimeout(function () {
    notification.remove();
}, 3000); 
}
</script>

</html>