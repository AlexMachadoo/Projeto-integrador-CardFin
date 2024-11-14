document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector("#hamburger-button");
    const navMenu = document.querySelector("#mobile-nav-menu");

    menuButton.addEventListener("click", function() {
        
        navMenu.classList.toggle("hidden");
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
});