document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar-menu');
    const navbarClose = document.getElementById('navbar-close');
    const navbarOpen = document.getElementById('navbar-open');

    navbarClose.addEventListener('click', () => {
        navbar.classList.toggle('hidden');

    });

    navbarOpen.addEventListener('click', () => {
        navbar.classList.toggle('hidden');
    });
});