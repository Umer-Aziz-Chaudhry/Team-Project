const data = [
  {
    id: 1,
    name: "Nokia G11",
    img: "media/m1.jpg",
    amt: 89,
    seller: "Nokia Ltd.",
    catagory: "Phone",
  },
  
  {
    id: 2,
    name: "Pixel 4a",
    img: "media/m2.jpg",
    amt: 130,
    seller: "Google",
    catagory: "Phone",
  },
  
  {
    id: 3,
    name: "iPhone 12",
    img: "media/m3.jpg",
    amt: 349,
    seller: "Apple",
    catagory: "Phone",
  },
  
  {
    id: 4,
    name: "Samsung Galaxy S22",
    img: "media/m4.jpg",
    amt: 478,
    seller: "Samsung",
    catagory: "Phone",
  },
  
  {
    id: 5,
    name: "HUAWEI P20 Pro",
    img: "media/m5.jpg",
    amt: 729,
    seller: "HUAWEI",
    catagory: "Phone",
  },
  
  {
    id: 6,
    name: "Fire Boltt Ninja 2",
    img: "media/p1.jpg",
    amt: 60,
    seller: "Boltt",
    catagory: "Watch",
  },

  {
    id: 7,
    name: "Noise Pulse Go",
    img: "media/p2.jpg",
    amt: 130,
    seller: "Noise",
    catagory: "Watch",
  },

  {
    id: 8,
    name: "boAt Xtend Pro",
    img: "media/p3.jpg",
    amt: 75,
    seller: "Rajesh Watchs",
    catagory: "Watch",
  },
  {
    id: 9,
    name: "Lenovo Tab M8",
    img: "media/p4.jpg",
    amt: 99,
    seller: "Stonehenge Retail",
    catagory: "Tablets",
  },
  {
    id: 10,
    name: "Honor PAD X8",
    img: "media/p5.jpg",
    amt: 129,
    seller: "Honor UK",
    catagory: "Tablets",
  },

  {
    id: 11,
    name: "IKALL N9",
    img: "media/p6.jpg",
    amt: 399,
    seller: "IKALL",
    catagory: "Tablets",
  },

  {
    id: 12,
    name: "Oppo Pad Air",
    img: "media/p7.jpg",
    amt: 199,
    seller: "Oppo",
    catagory: "Tablets",
  },
  {
    id: 13,
    name: "Acer EK220Q",
    img: "media/p8.jpg",
    amt: 174,
    seller: "Accer",
    catagory: "Monitors",
  },
  {
    id: 14,
    name: "Samsung 24",
    img: "media/p9.jpg",
    amt: 179,
    seller: "Samsung",
    catagory: "Monitors",
  },

  {
    id: 15,
    name: "ZEBRONICS AC32FHD",
    img: "media/p10.jpg",
    amt: 129,
    seller: "ZEBRONICS",
    catagory: "Monitors",
  },
];

const productsContainer = document.querySelector(".products");
const categoryList = document.querySelector(".category-list");

function displayProducts(products) {
  if (products.length > 0) {
    const product_details = products
      .map(
        (product) => `
  <div class="product">
  <div class="img">
    <img src="${product.img}" alt="${product.name}" />
  </div>
  <div class="product-details">
    <span class="name">${product.name}</span>
    <span class="amt">£${product.amt}</span>
    <span class="seller">${product.seller}</span>
  </div>
</div>`
      )
      .join("");

    productsContainer.innerHTML = product_details;
  } else {
    productsContainer.innerHTML = "<h3>No Products Available</h3>";
  }
}

function setCategories() {
  const allCategories = data.map((product) => product.catagory);
  //console.log(allCategories);
  const catagories = [
    "All",
    ...allCategories.filter((product, index) => {
      return allCategories.indexOf(product) === index;
    }),
  ];
  //console.log(catagories);
  categoryList.innerHTML = catagories.map((catagory) => `<li>${catagory}</li>`).join("");

  categoryList.addEventListener("click", (e) => {
    const selectedCatagory = e.target.textContent;
    selectedCatagory === "All" ? displayProducts(data) : displayProducts(data.filter((product) => product.catagory == selectedCatagory));
  });
}
const priceRange = document.querySelector("#priceRange");
const priceValue = document.querySelector(".priceValue");

function setPrices() {
  const priceList = data.map((product) => product.amt);
  const minPrice = Math.min(...priceList);
  const maxPrice = Math.max(...priceList);
  priceRange.min = minPrice;
  priceRange.max = maxPrice;
  priceValue.textContent = "£" + maxPrice;

  priceRange.addEventListener("input", (e) => {
    priceValue.textContent = "£" + e.target.value;
    displayProducts(data.filter((product) => product.amt <= e.target.value));
  });
}

const txtSearch = document.querySelector("#txtSearch");
txtSearch.addEventListener("keyup", (e) => {
  const value = e.target.value.toLowerCase().trim();
  if (value) {
    displayProducts(data.filter((product) => product.name.toLowerCase().indexOf(value) !== -1));
  } else {
    displayProducts(data);
  }
});

displayProducts(data);
setCategories();
setPrices();