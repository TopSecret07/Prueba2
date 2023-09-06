document.addEventListener('DOMContentLoaded', function() {
    const navbarToggleBtn = document.getElementById('navbarToggleBtn');
    const navbarNav = document.getElementById('navbarNav');

    navbarToggleBtn.addEventListener('click', function() {
        navbarNav.classList.toggle('show');
    });
});