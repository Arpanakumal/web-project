document.addEventListener('DOMContentLoaded', () => {
    const eyeIcon = document.getElementById('eye');
    const passwordField = document.getElementById('password');

    if (eyeIcon && passwordField) {
        eyeIcon.addEventListener('click', () => {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    }
});
