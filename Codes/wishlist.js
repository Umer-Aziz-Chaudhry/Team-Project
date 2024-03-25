document.addEventListener('DOMContentLoaded', function () {
     
    var wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    
    var wishlistContent = document.getElementById('wishlist-content');
    wishlist.forEach(function (item, index) {
        var listItem = document.createElement('div');
        listItem.innerHTML = `
            <div>
                <span style="font-weight: bold; font-size: 16px;">${index + 1}. </span>
                <img src="${item.image}" alt="${item.name}" style="max-width: 100%; max-height: 200px;">
                <h2>${item.name}</h2>
                <button onclick="removeFromWishlist(${index})">Remove</button>
            </div>
            <hr style="margin: 10px 0;"> <!-- Separating line -->
        `;
        wishlistContent.appendChild(listItem);
    });
});


function removeFromWishlist(index) {
    var wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    wishlist.splice(index, 1);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));

    
    var wishlistContent = document.getElementById('wishlist-content');
    wishlistContent.innerHTML = ''; 
    wishlist.forEach(function (item, newIndex) {
        var listItem = document.createElement('div');
        listItem.innerHTML = `
            <div>
                <span style="font-weight: bold; font-size: 16px;">${newIndex + 1}. </span>
                <img src="${item.image}" alt="${item.name}" style="max-width: 100%; max-height: 200px;">
                <h2>${item.name}</h2>
                <button onclick="removeFromWishlist(${newIndex})">Remove</button>
            </div>
            <hr style="margin: 10px 0;"> <!-- Separating line -->
        `;
        wishlistContent.appendChild(listItem);
    });
}