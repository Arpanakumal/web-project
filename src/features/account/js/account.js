const SignUpButton = document.getElementById('SignUpButton');
const SignInButton = document.getElementById('SignInButton');
const SignInForm = document.getElementById('SignIn');
const signupForm = document.getElementById('signup');

SignUpButton.addEventListener('click', function () {
    SignInForm.style.display = "none";
    signupForm.style.display = "block";
});

SignInButton.addEventListener('click', function () {
    SignInForm.style.dsiplay = "block";
    signupForm.style.display = "none";
});

