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
            <i class="mobile-icon fa fa-mobile"></i>
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
            <li><a href="offer.html" class="nav-link">Offers</a></li>
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


            $productId = isset($_GET['id']) ? intval($_GET['id']) : null;

            if ($productId !== null) {
                $sql = "SELECT * FROM products WHERE id = $productId";
                $result = $conn->query($sql);

                if ($result !== false && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $productName = $row['product_name'];
                    $productPrice = $row['price'];
                    $productImage = $row['product_image'];
                    $productCategory = $row['category'];
                    $productDescription = $row['description_'];

                    echo "<h2>$productName</h2>";

                    
                    echo '<div id="slideshow">';
                    echo '<div class="slide active">';
                    echo "<img src='$productImage' alt='$productName' style='max-width: 100%; max-height: 400px;'>";
                    echo '</div>';
                   
                    echo '</div>';

                    echo "<p>Price: $$productPrice</p>";

                    
                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo "<p>$productDescription</p>";
                    echo '</div>';

                 
                    echo '<button id="add-to-wishlist" onclick="addToWishlist()" class="fancy-button">Add to Wishlist</button>';

                    
                    echo '<button id="add-to-cart" onclick="addToCart()" class="fancy-button">Add to Cart</button>';
                } else {
                    
                    echo "<h2>Product Not Found</h2>";
                    echo '<p>Price: $0.00</p>';
                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo '<p>No description available.</p>';
                    echo '</div>';
                }
            } else {
               
                echo "<h2>Product ID Missing</h2>";
                echo '<p>Price: $0.00</p>';
                echo '<div id="product-description">';
                echo '<h3>Description</h3>';
                echo '<p>No description available.</p>';
                echo '</div>';
            }

            $conn->close();
            ?>
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

        $sql = "SELECT * FROM products WHERE category = '$category' AND id != $currentProductId";
        $result = $conn->query($sql);


        if (!$result) {
            die("Query failed: " . $conn->error);
        }


        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo '<a href="product_details.php?id=' . $row['id'] . '">';
                echo '<div class="product" id="product' . $row['id'] . '">';
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
            <h4>Social</h4>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">TikTok</a>
            <a href="#">Youtube</a>
            <a href="#">Whatsapp</a>
        </div>
        <div>
            <h4>Legal</h4>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Partners</a>
            <a href="#">Admittance Procedure</a>
            <a href="#">Persoonal Information</a>
            <a href="#">Adversite</a>
        </div>
        <div>
            <h4>Events</h4>
            <a href="#">Groups and Events</a>
            <a href="#">Private Watch Party</a>
            <a href="#">Theatre</a>
            <a href="#">Birthday Parties</a>
            <a href="#">Film Festivals</a>
            <a href="#">IMAX Educational Screenings</a>
        </div>
        <div>
            <h4>Contact Us</h4> 
            <p>Email: info@cinema.com</p>
            <p>Phone: 123-456-7890</p>
            <p>Address: Aston, Birmingham</p>
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