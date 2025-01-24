function validateForm(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordPattern = /[a-zA-Z0-9.]/;
    let valid = true;

    if (!emailPattern.test(email)) {
        document.getElementById('validationError').textContent = 'Invalid email format';
        valid = false;
    } else if (!passwordPattern.test(password)) {
        document.getElementById('validationError').textContent =
            'Password must at least 6 characters long and inlcude atleast one letter and number.';
        valid = false;
    } else {
        document.getElementById('validationError').textContent = '';
    }

    if (!valid) {
        event.preventDefault();
    }
}
document.getElementById('referrer').value = document.referrer;

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
