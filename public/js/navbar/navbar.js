document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector("#hamburger-button");
    const navMenu = document.querySelector("#mobile-nav-menu");

    menuButton.addEventListener("click", function() {
        
        navMenu.classList.toggle("hidden");
    });
});
