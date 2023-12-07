
    // JavaScript to handle slideshow functionality
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

    // Function to switch to the next slide every 3 seconds
    function startSlideshow() {
        setInterval(() => {
            nextSlide();
        }, 3000);
    }

    // Display the first slide initially
    showSlide(currentSlide);

    // Start the slideshow
    startSlideshow();
    

    function searchItem() {
        // Get the value entered in the search input
        const searchTerm = document.getElementById('search-input').value;
    
        // Placeholder database (replace this with your actual database logic)
        const database = [
            { name: 'Product 1', category: 'Mobiles' },
            { name: 'Product 2', category: 'Watches' },
            { name: 'Product 3', category: 'Air Pods' },
        ];
    
        // Check if the searched term is present in the database
        const results = database.filter(item => item.name.toLowerCase().includes(searchTerm.toLowerCase()));
    
        // Display the results (you can customize this part based on your needs)
        if (results.length > 0) {
            alert(`Found ${results.length} item(s) matching "${searchTerm}": ${results.map(item => item.name).join(', ')}`);
        } else {
            alert(`No items found matching "${searchTerm}"`);
        }
    }
