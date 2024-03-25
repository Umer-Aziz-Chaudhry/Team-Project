

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
    var searchQuery = document.getElementById('search-input').value;
    window.location.href = 'search_results.php?search_text=' + encodeURIComponent(searchQuery);
}
