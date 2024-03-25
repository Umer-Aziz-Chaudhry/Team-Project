<!DOCTYPE html>
<html>
<style>
    /* Add this style to the existing styles */
#wishlist {
    display: flex;
    align-items: center;
    margin-left: 62%; /* Adjust the spacing as needed */
    border-right: 1px solid white; /* Add a white border to the right of the cart button */
    padding-right: 5px; /* Add some padding to the right of the border for better spacing */
    border-left: 1px solid white;
    padding-left: 5px;
}

#wishlist i {
    font-size: 24px;
    margin-right: 5px;
    margin-left: 8px;
}
footer .copyright {
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 10px 0; /* Adjust padding as needed */
    width: 100%; /* Ensure it spans the entire width if it's not already doing so */
}
</style>
<head>

    <title>Mobile Wave</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/227527f8c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...your-sha512-hash..." crossorigin="anonymous" />
    <link rel="stylesheet" href="index.css">
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

        <a href="wishlist_page.html" id="wishlist" class="header-action">
            <i class="fas fa-heart"></i>
            &nbsp;&nbsp;
        </a>

        <a href="Cart.html" id="cart" style="font-size: 18px; text-decoration: none; color: white;">
            <i class="fas fa-shopping-cart"></i>
            &nbsp;&nbsp;
        </a>

        <?php if (isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php" style="font-size: 18px; text-decoration: none; color: white;">
            <?php echo htmlspecialchars($_SESSION['firstName']); ?>
        </a>
    <?php else: ?>
        <a href="login.html" id="signin" style="font-size: 18px; text-decoration: none; color: white;">
            <i class="fa-solid fa-right-to-bracket" style="color: white;"></i>
            &nbsp;&nbsp;Sign In / Join Now
        </a>
    <?php endif; ?>
    <!-- Logout link might be conditionally displayed as well -->
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php" id="logout" style="color: white;">Logout</a>
    <?php endif; ?>

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

    <div id="content">


        <div id="slideshow">
            <div id="left-arrow" onclick="prevSlide()">&#10094;</div>
            <img id="slide1" class="slide" src="media/slide1.jpg" alt="Slide 1">
            <img id="slide2" class="slide" src="media/slide2.jpg" alt="Slide 2">
            <img id="slide3" class="slide" src="media/slide3.jpg" alt="Slide 3">
            <div id="right-arrow" onclick="nextSlide()">&#10095;</div>
        </div>

        <?php
        include 'db_connection.php';



        function displayProducts($category, $containerId)
        {
            global $conn;
        
            $sql = "SELECT * FROM products WHERE category = '$category'";
            $result = $conn->query($sql);
        
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $productId = isset($row['id']) ? $row['id'] : ''; // Check if 'id' is set in the row
                    $productName = isset($row['product_name']) ? $row['product_name'] : '';
                    $productImage = isset($row['product_image']) ? $row['product_image'] : '';
                    $productPrice = isset($row['price']) ? $row['price'] : '';
        
                    echo '<a href="product_details.php?id=' . $row['product_id'] . '">';
                    echo '<div class="product" id="product' . $productId . '">';
                    echo '<img src="' . $productImage . '" alt="' . $productName . '">';
                    echo '<p class="product-name">' . $productName . '</p>';
                    echo '<p class="product-price">' . $productPrice . '</p>';
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo "No products found for category: $category";
            }
        }
        

        // Display Mobiles
        echo '<h2 id="mobiles-category" class="product-catagory">Mobiles</h2>';
        echo '<div class="product-container" id="mobiles-container">';
        displayProducts('Mobiles', 'mobiles-container');
        echo '</div>';

        // Display Watches
        echo '<h2 id="watches-category" class="product-catagory">Watches</h2>';
        echo '<div class="product-container" id="watches-container">';
        displayProducts('Watches', 'watches-container');
        echo '</div>';

        // Display Air Pods
        echo '<h2 id="airpods-category" class="product-catagory">Air Pods</h2>';
        echo '<div class="product-container" id="airpods-container">';
        displayProducts('Air Pods', 'airpods-container');
        echo '</div>';

        // Display Tablets
        echo '<h2 id="airpods-category" class="product-catagory">Tablets</h2>';
        echo '<div class="product-container" id="airpods-container">';
        displayProducts('Tablets', 'airpods-container');
        echo '</div>';

        // Display Monitors
        echo '<h2 id="airpods-category" class="product-catagory">Monitors</h2>';
        echo '<div class="product-container" id="airpods-container">';
        displayProducts('Monitors', 'airpods-container');
        echo '</div>';

        $conn->close();
        ?>
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

<script src="index.js"></script>

</html>