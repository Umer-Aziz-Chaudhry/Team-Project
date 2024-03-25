<?php
// Start the session
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Ensure the file extension matches your login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // AJAX call for updating information
            $('#update-info-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "update_info.php", // The PHP file that updates user info
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response); // Alert the user or update the UI
                    }
                });
            });

            // AJAX call for updating password
            $('#update-password-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "update_password.php", // The PHP file that updates the password
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response); // Alert the user or update the UI
                    }
                });
            });

            // Tab functionality
            $('#info-tab').click(function() {
                $('.tab-content').hide();
                $('#info-form').show();
            });
            
            $('#password-tab').click(function() {
                $('.tab-content').hide();
                $('#password-form').show();
            });
            
            $('#orders-tab').click(function() {
                $('.tab-content').hide();
                $('#orders-section').show();
                // Trigger AJAX call to fetch order data here if needed
            });
            
            // Show the info form by default
            $('#info-form').show();

            $('.tab-button').click(function() {
                var tabId = $(this).attr('id').replace('-tab', '');
                $('.tab-button').removeClass('active'); // Remove active class from all tabs
                $('.tab-content').removeClass('active'); // Hide all content
                $(this).addClass('active'); // Add active class to clicked tab
                $('#' + tabId + '-form').addClass('active'); // Show the clicked tab's content
            });

            // Show the info form by default
            $('#info-form').addClass('active');
        });
    </script>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="logout.php" id="logout">Logout</a> 
    </nav>

    <div id="dashboard">
        <h1>User Dashboard</h1>
        <div id="tabs">
            <button id="info-tab">Update Information</button>
            <button id="password-tab">Update Password</button>
            <button id="orders-tab">Previous Orders</button>
        </div>
        
        <div id="info-form" class="tab-content">
            <form id="update-info-form" method="post">
                <input type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <button type="submit">Update Information</button>
            </form>
        </div>

        <div id="password-form" class="tab-content" style="display:none;">
            <form id="update-password-form" method="post">
                <input type="password" name="password" placeholder="New Password" required>
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                <button type="submit">Update Password</button>
            </form>
        </div>

        <div id="orders-section" class="tab-content" style="display:none;">
            <a href="order_history.html" >Previous Orders</a>
        </div>

    </div>
    <script>
        // Include your JavaScript code here
        // Add logout functionality
        $('#logout').click(function() {
            $.ajax({
                url: 'logout.php', // Make sure you have this file to handle logout
                type: 'POST',
                success: function(response) {
                    window.location = 'login.html'; // Redirect to login page
                }
            });
        });
    </script>
</body>
</html>
