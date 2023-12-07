<!DOCTYPE html>
<html>

<head>
    <title>Mobile Wave</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/227527f8c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
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
        <a href="#" id="wishlist" style="font-size: 18px; text-decoration: none; color: red;">
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
            <li><a href="index.php" class="nav-link active">Home</a></li>
            <li><a href="AboutUS.html" class="nav-link">About Us</a></li>
            <li><a href="product.html" class="nav-link">Product Catalog</a></li>
            <li><a href="contact.html" class="nav-link">Contact US</a></li>
            <li><a href="offer.html" class="nav-link">Offers</a></li>
        </ul>
    </div>

    <div id="content">
        <?php
        include 'db_connection.php';

        // Function to display products
        function displayProducts($category, $containerId)
        {
            global $conn;

            $sql = "SELECT * FROM products WHERE category = '$category'";
            $result = $conn->query($sql);

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product" id="product' . $row['id'] . '">';
                echo '<a href="product_details.html">';
                echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<p class="product-name">' . $row['name'] . '</p>';
                echo '<p class="product-price">' . $row['price'] . '</p>';
                echo '</a>';
                echo '</div>';
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

        $conn->close();
        ?>
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

<script src="index.js"></script>

</html>
