document.getElementById('menuToggle').addEventListener('click', function() {
    var navbar = document.getElementById('navbar');
    navbar.classList.toggle('active');
});

document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.getElementById('loginBtn');
    const signupBtn = document.getElementById('signupBtn');
    const loginModal = document.getElementById('loginModal');
    const closeBtn = document.getElementById('closeBtn');

    loginBtn.addEventListener('click', () => {
        loginModal.style.display = 'flex';
    });

    closeBtn.addEventListener('click', () => {
        loginModal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == loginModal) {
            loginModal.style.display = 'none';
        }
    });

    setTimeout(() => {
        loginModal.style.display = 'flex';
    }, 10000);
});
