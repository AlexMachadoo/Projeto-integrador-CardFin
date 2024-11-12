document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const items = document.querySelectorAll(".carousel-item");
    const totalItems = items.length;
    const carousel = document.querySelector(".carousel");

    function nextSlide() {
        if (currentIndex === totalItems - 1) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }
        updateCarousel();
    }

    function prevSlide() {
        if (currentIndex === 0) {
            currentIndex = totalItems - 1;
        } else {
            currentIndex--;
        }
        updateCarousel();
    }

    function updateCarousel() {
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;
    }

    setInterval(nextSlide, 5000);

    document.querySelector(".carousel-next").addEventListener("click", nextSlide);
    document.querySelector(".carousel-prev").addEventListener("click", prevSlide);
});
