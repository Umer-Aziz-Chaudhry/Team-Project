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