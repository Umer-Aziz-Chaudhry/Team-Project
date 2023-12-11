

const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}


function startSlideshow() {
setInterval(() => {
    nextSlide();
}, 3000);
}


showSlide(currentSlide);


startSlideshow();


function searchItem() {

    const searchTerm = document.getElementById('search-input').value;


    const database = [
        { name: 'Product 1', category: 'Mobiles' },
        { name: 'Product 2', category: 'Watches' },
        { name: 'Product 3', category: 'Air Pods' },
    ];


    const results = database.filter(item => item.name.toLowerCase().includes(searchTerm.toLowerCase()));


    if (results.length > 0) {
        alert(`Found ${results.length} item(s) matching "${searchTerm}": ${results.map(item => item.name).join(', ')}`);
    } else {
        alert(`No items found matching "${searchTerm}"`);
    }
}
