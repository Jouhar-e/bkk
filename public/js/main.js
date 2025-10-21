// Mobile menu toggle
document
    .getElementById("mobile-menu-button")
    .addEventListener("click", function () {
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");
    });

// Mobile dropdown toggles
document.querySelectorAll(".mobile-dropdown-toggle").forEach((button) => {
    button.addEventListener("click", function () {
        const menu = this.nextElementSibling;
        menu.classList.toggle("hidden");

        // Rotate chevron icon
        const icon = this.querySelector(".fa-chevron-down");
        if (icon) {
            icon.classList.toggle("fa-chevron-down");
            icon.classList.toggle("fa-chevron-up");
        }
    });
});
