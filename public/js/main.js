// Mobile menu toggle
document.getElementById("mobile-menu-button").addEventListener("click", function () {
    const mobileMenu = document.getElementById("mobile-menu");
    mobileMenu.classList.toggle("hidden");
    mobileMenu.classList.toggle("animate-slide-down");
});

// Mobile dropdown toggles
document.querySelectorAll(".mobile-dropdown-toggle").forEach((button) => {
    button.addEventListener("click", function () {
        const menu = this.nextElementSibling;
        const icon = this.querySelector(".fa-chevron-down, .fa-chevron-up");

        // Tutup semua dropdown lain
        document.querySelectorAll(".mobile-dropdown-content").forEach((otherMenu) => {
            if (otherMenu !== menu) {
                otherMenu.classList.add("hidden");
                const otherIcon = otherMenu.previousElementSibling.querySelector(".fa-chevron-up");
                if (otherIcon) {
                    otherIcon.classList.remove("fa-chevron-up");
                    otherIcon.classList.add("fa-chevron-down");
                }
            }
        });

        // Toggle dropdown aktif
        menu.classList.toggle("hidden");
        menu.classList.toggle("animate-slide-down");

        // Ubah ikon chevron
        if (icon) {
            icon.classList.toggle("fa-chevron-down");
            icon.classList.toggle("fa-chevron-up");
        }
    });
});
