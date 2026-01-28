import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // Login form handling
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        const submitBtn = loginForm.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');

        loginForm.addEventListener('submit', () => {
            btnText.textContent = 'Verifying Credentials...';
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
        });
    }

    // User menu dropdown handling
    window.toggleUserMenu = function() {
        const dropdown = document.getElementById('user-dropdown');
        if (dropdown) dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', (e) => {
        const menu = document.getElementById('user-menu');
        const dropdown = document.getElementById('user-dropdown');
        const button = menu ? menu.querySelector('button') : null;
        
        // Prevent closing if clicking the button itself (which triggers the toggle)
        if (button && button.contains(e.target)) {
            return;
        }

        if (menu && dropdown && !menu.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
});
