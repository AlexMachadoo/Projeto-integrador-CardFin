document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    function updateCarousel() {
        const carouselSlide = document.querySelector('.carousel-slide');
        carouselSlide.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = (currentSlide === 0) ? totalSlides - 1 : currentSlide - 1;
        updateCarousel();
    }

    document.querySelector('.carousel-nav.prev').addEventListener('click', prevSlide);
    document.querySelector('.carousel-nav.next').addEventListener('click', nextSlide);

    updateCarousel();
});
