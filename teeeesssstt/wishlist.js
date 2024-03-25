document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-button').addEventListener('click', addWish);
    document.getElementById('wish-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            addWish();
            event.preventDefault(); // Prevent form submission
        }
    });
    document.getElementById('searchInput').addEventListener('input', handleSearchInput);

    renderWishlist(); // Initial rendering of the wishlist
});

let items = [
    { id: "Nokia G11", name: "Nokia G11", active: true, image: "media/m1.jpg" },
    { id: "Pixel 4a", name: "Pixel 4a", active: true, image: "media/m2.jpg" },
    { id: "iPhone 12", name: "iPhone 12", active: true, image: "media/m3.jpg" },
    { id: "Samsung Galaxy S22", name: "Samsung Galaxy S22", active: true, image: "media/m4.jpg" },
    { id: "HUAWEI P20 Pro", name: "HUAWEI P20 Pro", active: true, image: "media/m5.jpg" },
    { id: "Fire Boltt Ninja 2", name: "Fire Boltt Ninja 2", active: true, image: "media/p1.jpg" },
    { id: "Noise Pulse Go", name: "Noise Pulse Go", active: true, image: "media/p2.jpg" },
    { id: "boAt Xtend Pro", name: "boAt Xtend Pro", active: true, image: "media/p3.jpg" },
    { id: "Lenovo Tab M8", name: "Lenovo Tab M8", active: true, image: "media/p4.jpg" },
    { id: "Honor PAD X8", name: "Honor PAD X8", active: true, image: "media/p5.jpg" },
    { id: "IKALL N9", name: "IKALL N9", active: true, image: "media/p6.jpg" },
    { id: "Oppo Pad Air", name: "Oppo Pad Air", active: true, image: "media/p7.jpg" },
    { id: "Acer EK220Q", name: "Acer EK220Q", active: true, image: "media/p8.jpg" },
    { id: "Samsung 24", name: "Samsung 24", active: true, image: "media/p9.jpg" },
    { id: "ZEBRONICS AC32FHD", name: "ZEBRONICS AC32FHD", active: true, image: "media/p10.jpg" }
];

function renderWishlist(searchTerm = "") {
    const wishlistDiv = document.getElementById("wish-list");
    wishlistDiv.innerHTML = ""; // Clear the wishlist
    items.filter(item => item.active && item.name.toLowerCase().includes(searchTerm.toLowerCase())).forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'wishlist-item';
        itemDiv.innerHTML = `
            <img src="${item.image}" alt="${item.name}" style="width: 100px; height: auto;">
            <span class="item-name">${item.name}</span>
            <button class="delete-button" onclick="removeItem('${item.id}')">&#10006;</button>
        `;
        wishlistDiv.appendChild(itemDiv);
    });
}

function addWish() {
    const wishInput = document.getElementById('wish-input');
    const wishText = wishInput.value.trim();
    if (!wishText) {
        alert("Please enter a wish name.");
        return;
    }
    const existingItem = items.find(item => item.name.toLowerCase() === wishText.toLowerCase());

    if (existingItem && !existingItem.active) {
        existingItem.active = true; // Reactivate the item
        wishInput.value = '';
        renderWishlist();
        return;
    }

    if (!existingItem) {
        items.push({
            id: wishText.replace(/\s+/g, '-').toLowerCase() + "-" + Date.now(),
            name: wishText,
            active: true,
            image: "media/default.jpg" // Placeholder for the default image path
        });
        wishInput.value = '';
        renderWishlist();
    } else {
        alert("Item already exists.");
    }
}

function removeItem(itemId) {
    const itemIndex = items.findIndex(item => item.id === itemId);
    if (itemIndex > -1) {
        items[itemIndex].active = false; // Mark the item as inactive
        renderWishlist();
    }
}

function handleSearchInput() {
    const searchInput = document.getElementById("searchInput").value;
    renderWishlist(searchInput.toLowerCase());
}

itemDiv.innerHTML = `
    <img src="${item.image}" alt="${item.name}" class="wishlist-item-image" style="width: auto; height: auto;">
    <span class="item-name">${item.name}</span>
    <button class="delete-button" onclick="removeItem('${item.id}')">&#10006;</button>
`;
