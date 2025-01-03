function validateForm(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let valid = true;

    if (!emailPattern.test(email)) {
        document.getElementById('validationError').textContent = 'Invalid email format';
        valid = false;
    } else if (!passwordPattern.test(password)) {
        document.getElementById('validationError').textContent =
            'Password must be at least 8 characters long and include at least one letter and one number';
        valid = false;
    } else {
        document.getElementById('validationError').textContent = '';
    }

    if (!valid) {
        event.preventDefault();
    }
}


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
