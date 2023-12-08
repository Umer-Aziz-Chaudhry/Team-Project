<!DOCTYPE html>
<html>
<style>
    /* Fancy button styles */
    .fancy-button {
        background-color: #4CAF50; /* Green background */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .fancy-button:hover {
        background-color: #45a049; /* Darker green on hover */
    }
</style>
<head>
    <title>Product Details - Mobile Wave</title>
    <link rel="stylesheet" href="product_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/227527f8c4.js" crossorigin="anonymous"></script>

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
        <a href="#" id="cart" style="font-size: 18px; text-decoration: none; color: white;">
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
            <li><a href="index.php
            " class="nav-link active">Home</a></li>
            <li><a href="AboutUS.html" class="nav-link">About Us</a></li>
            <li><a href="product.html" class="nav-link">Product Catalog</a></li>
            <li><a href="contact.html" class="nav-link">Contact US</a></li>
            <li><a href="offer.html" class="nav-link">Offers</a></li>
        </ul>
    </div>

    <div id="content">
        <div id="product-details">
            <?php
            include 'db_connection.php';

            function displayRelatedProducts($conn, $categoryId)
            {
                $sql = "SELECT * FROM products WHERE category = '$categoryId' LIMIT 4";
                $result = $conn->query($sql);
            
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product" id="related-product' . $row['id'] . '">';
                    echo '<a href="product_details.php?id=' . $row['id'] . '">';
                    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                    echo '<p class="product-name">' . $row['name'] . '</p>';
                    echo '<p class="product-price">' . $row['price'] . '</p>';
                    echo '</a>';
                    echo '</div>';
                }
            
                // Close the result set (but leave the connection open)
                $result->close();
            }
            
            

            $productId = isset($_GET['id']) ? intval($_GET['id']) : null;

            if ($productId !== null) {
                $sql = "SELECT * FROM products WHERE id = $productId";
                $result = $conn->query($sql);

                if ($result !== false && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];
                    $productCategory = $row['category'];
                    $productDescription = $row['description'];

                    echo "<h2>$productName</h2>";

                    // Slideshow Section for Additional Pictures
                    echo '<div id="slideshow">';
                    echo '<div class="slide active">';
                    echo "<img src='$productImage' alt='$productName' style='max-width: 100%; max-height: 400px;'>";
                    echo '</div>';
                    // Add more slides for additional pictures if needed
                    echo '</div>';

                    echo "<p>Price: $$productPrice</p>";

                    // Product Description Section
                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo "<p>$productDescription</p>";
                    echo '</div>';

                    // "Add to Wishlist" Button
                    echo '<button id="add-to-wishlist" onclick="addToWishlist()" class="fancy-button">Add to Wishlist</button>';

                    // "Add to Cart" Button
                    echo '<button id="add-to-cart" onclick="addToCart()" class="fancy-button">Add to Cart</button>';
                } else {
                    // Handle the case where no product is found with the given ID
                    echo "<h2>Product Not Found</h2>";
                    echo '<p>Price: $0.00</p>';
                    echo '<div id="product-description">';
                    echo '<h3>Description</h3>';
                    echo '<p>No description available.</p>';
                    echo '</div>';
                }
            } else {
                // Handle the case where no product ID is provided in the URL
                echo "<h2>Product ID Missing</h2>";
                echo '<p>Price: $0.00</p>';
                echo '<div id="product-description">';
                echo '<h3>Description</h3>';
                echo '<p>No description available.</p>';
                echo '</div>';
            }

            $conn->close();

            // Display related products
            echo '<h2>Related Products</h2>';
            echo '<div class="product-container" id="related-products-container">';
            
            // Check if the connection is closed and open it if needed
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            displayRelatedProducts($conn, $productCategory);
            echo '</div>';
    
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
<script>
    function addToWishlist() {
        // Fetch product details
        var productName = "<?php echo $productName; ?>";
        var productPrice = "<?php echo $productPrice; ?>";
        var productImage = "<?php echo $productImage; ?>";
        var productCategory = "<?php echo $productCategory; ?>";
        var productDescription = "<?php echo $productDescription; ?>";

        // Create a wishlist item object
        var wishlistItem = {
            name: productName,
            price: productPrice,
            image: productImage,
            category: productCategory,
            description: productDescription
        };

        // Get existing wishlist from cookies or initialize an empty array
        var wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        // Add the current product to the wishlist
        wishlist.push(wishlistItem);

        // Save the updated wishlist back to cookies
        localStorage.setItem('wishlist', JSON.stringify(wishlist));

        // Add a yellow dot to indicate an item is in the wishlist
        var wishlistIcon = document.getElementById('wishlist');
        wishlistIcon.innerHTML = '<i class="fas fa-heart"></i>&nbsp;&nbsp;<span class="wishlist-dot"></span>';
    }
</script>

<script>
    // ... (previous script code) ...

    function addToCart() {
        // Fetch product details
        var productName = "<?php echo $productName; ?>";
        var productPrice = "<?php echo $productPrice; ?>";
        var productImage = "<?php echo $productImage; ?>";
        var productCategory = "<?php echo $productCategory; ?>";
        var productDescription = "<?php echo $productDescription; ?>";

        // Create a cart item object
        var cartItem = {
            name: productName,
            price: productPrice,
            image: productImage,
            category: productCategory,
            description: productDescription
        };

        // Get existing cart from cookies or initialize an empty array
        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Add the current product to the cart
        cart.push(cartItem);

        // Save the updated cart back to cookies
        localStorage.setItem('cart', JSON.stringify(cart));

        // Perform any additional actions you want when adding to the cart
        // ...

        // For demonstration purposes, you can change the color of the cart icon
        var cartIcon = document.getElementById('cart');
        cartIcon.style.color = 'orange';
    }
</script>
</html>