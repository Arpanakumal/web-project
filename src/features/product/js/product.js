


document.addEventListener("DOMContentLoaded", function () {
    // JavaScript code goes here
    let cart = [];

    // Add event listeners for all "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (event) => {
            // Get product information from the parent elements (like name, price)
            const productCard = event.target.closest('.col-4');
            const productName = productCard.querySelector('h4').textContent;
            const productPrice = productCard.querySelector('p').textContent;

            // Create a product object and add it to the cart array
            const product = {
                name: productName,
                price: productPrice,
            };
            cart.push(product);

            // Optionally, show a confirmation message or update the cart icon
            alert(`${productName} has been added to the cart!`);
            console.log(cart); // Log cart to the console for debugging
        });
    });
});


function loadCart() {
    const cartTable = document.querySelector("#cart-table tbody");
    const cartItems = JSON.parse(localStorage.getItem('product'));

    if (cartItems) {
        cartItems.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="cart-info">
                        <img src="../../product/images/product5.jpg" alt="">
                    </div>
                    <p>${item.name}</p>
                    <small>Price: Rs.${item.price}</small>
                    <a href="#">Remove</a>
                </td>
                <td><input type="number" value="1" min="1" /></td>
                <td>Rs.${item.price}</td>
            `;
            cartTable.appendChild(row);
        });
        // Calculate and display the subtotal
        const subtotal = cartItems.reduce((sum, item) => sum + item.price, 0);
        const total = subtotal + (subtotal * 0.13); // 13% tax
        document.getElementById("subtotal").innerText = `Rs.${subtotal}`;
        document.getElementById("total").innerText = `Rs.${total}`;
    }
}

loadCart(); // Call the function to load cart on page load
