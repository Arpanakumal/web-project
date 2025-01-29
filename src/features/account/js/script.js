function validateForm(event) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const validationError = document.getElementById('validationError');

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

    let valid = true;

    console.log('Email:', email);
    console.log('Password:', password);

    if (!emailPattern.test(email)) {
        console.log('Invalid email format');
        validationError.textContent = 'Invalid email format.';
        valid = false;
    } else if (!passwordPattern.test(password)) {
        console.log('Invalid password format');
        validationError.textContent = 'Password must be at least 6 characters long and include one letter and one number.';
        valid = false;
    } else {
        validationError.textContent = '';
    }

    if (!valid) {
        console.log('Form validation failed');
        event.preventDefault();
    } else {
        console.log('Form validation passed');
    }
}

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

