// Select necessary elements
const cartTable = document.querySelector("table");
const subtotalElement = document.querySelector(".total-price table tr:nth-child(1) td:nth-child(2)");
const taxElement = document.querySelector(".total-price table tr:nth-child(2) td:nth-child(2)");
const totalElement = document.querySelector(".total-price table tr:nth-child(3) td:nth-child(2)");

const TAX_RATE = 0.13; // Tax rate of 13%

// Function to update cart totals
function updateCartTotals() {
    let subtotal = 0;

    // Loop through each row in the cart table
    const rows = cartTable.querySelectorAll("tr");
    rows.forEach((row, index) => {
        if (index === 0) return; // Skip the header row

        const quantityInput = row.querySelector("input[type='number']");
        const priceText = row.querySelector("small").textContent;
        const subtotalCell = row.querySelector("td:nth-child(3)");

        if (quantityInput && priceText && subtotalCell) {
            const price = parseInt(priceText.replace("Price:Rs.", "").trim());
            const quantity = parseInt(quantityInput.value);

            // Calculate subtotal for the current item
            const itemSubtotal = price * quantity;
            subtotal += itemSubtotal;

            // Update the subtotal for the item in the table
            subtotalCell.textContent = `Rs.${itemSubtotal}`;
        }
    });

    // Calculate tax and total
    const tax = subtotal * TAX_RATE;
    const total = subtotal + tax;

    // Update totals in the DOM
    subtotalElement.textContent = `Rs.${subtotal}`;
    taxElement.textContent = `${(TAX_RATE * 100).toFixed(0)}%`;
    totalElement.textContent = `Rs.${total.toFixed(2)}`;
}

// Function to handle item removal
function handleRemoveItem(event) {
    if (event.target.tagName === "A" && event.target.textContent === "Remove") {
        const row = event.target.closest("tr");
        if (row) {
            row.remove(); // Remove the row
            updateCartTotals(); // Update cart totals
        }
    }
}

// Add event listeners for quantity changes and item removal
cartTable.addEventListener("input", (event) => {
    if (event.target.type === "number") {
        updateCartTotals(); // Update totals when quantity changes
    }
});

cartTable.addEventListener("click", (event) => {
    handleRemoveItem(event); // Handle "Remove" link clicks
});

// Initialize the cart totals on page load
updateCartTotals();


document.addEventListener('DOMContentLoaded', function () {
    loadCart();  // Ensure the cart loads when the page is loaded
});

// Load cart items and update the UI
function loadCart() {
    const cartTable = document.querySelector("table");
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    if (!cartTable) {
        console.error("Cart table not found!");
        return;
    }

    const tbody = cartTable.querySelector("tbody") || cartTable;
    tbody.innerHTML = ""; // Clear existing items

    if (cartItems.length === 0) {
        tbody.innerHTML = "<tr><td colspan='3'>Your cart is empty.</td></tr>";
    } else {
        cartItems.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="cart-info">
                        <img src="${item.image}" alt="">
                    </div>
                    <p>${item.name}</p>
                    <small>Price: Rs.${item.price}</small>
                    <a href="#" onclick="removeFromCart(${item.id})">Remove</a>
                </td>
                <td>
                    <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)" />
                </td>
                <td>Rs.${item.price * item.quantity}</td>
            `;
            tbody.appendChild(row);
        });

        updateTotal(cartItems);
    }
}

// Update total price
function updateTotal(cartItems) {
    const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const tax = subtotal * 0.13; // 13% tax
    const total = subtotal + tax;

    document.querySelector(".total-price table tr:nth-child(1) td:nth-child(2)").innerText = `Rs.${subtotal}`;
    document.querySelector(".total-price table tr:nth-child(2) td:nth-child(2)").innerText = `Rs.${tax}`;
    document.querySelector(".total-price table tr:nth-child(3) td:nth-child(2)").innerText = `Rs.${total}`;
}

// Remove item from cart
function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.id !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart(); // Reload cart
}

// Update item quantity
function updateQuantity(id, newQuantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const itemIndex = cart.findIndex(item => item.id === id);
    if (itemIndex !== -1) {
        cart[itemIndex].quantity = parseInt(newQuantity, 10);
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    loadCart(); // Recalculate totals
}

// Add item to cart (example usage)
function addToCart(id, name, price, image) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItemIndex = cart.findIndex(item => item.id === id);
    if (existingItemIndex !== -1) {
        cart[existingItemIndex].quantity += 1; // Increase quantity if item already exists
    } else {
        cart.push({ id, name, price, image, quantity: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart(); // Refresh cart view
}


// Assuming loadProducts is called to get products from product.json
async function loadProducts() {
    try {
        const response = await fetch('/src/features/product/html/product.json');
        const products = await response.json();

        const productList = document.querySelector('.product-list'); // Ensure this is the correct container for products
        productList.innerHTML = ''; // Clear any existing products

        products.forEach(product => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');
            productItem.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Price: Rs. ${product.price}</p>
                <a href="#" onclick="addToCart(${product.id})">Add to Cart</a>
            `;
            productList.appendChild(productItem);
        });
    } catch (error) {
        console.error('Error loading products:', error);
    }
}
