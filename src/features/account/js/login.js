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
document.getElementById('eye').addEventListener('click', function () {
    var passwordField = document.getElementById('password');
    var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
});

// Function to add item to cart from query parameters
function handleAddToCartAfterLogin() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const name = urlParams.get('name');
    const price = urlParams.get('price');
    const image = urlParams.get('image');

    if (id && name && price && image) {
        // Add the product to the cart
        addToCart(parseInt(id), name, parseFloat(price), image);

        // Clear query parameters to prevent re-adding the product
        window.history.replaceState(null, null, window.location.pathname);

        // Redirect to the cart page
        window.location.href = "../../cart/html/cart.php";
    }
}

// Call the function when the page loads
handleAddToCartAfterLogin();


