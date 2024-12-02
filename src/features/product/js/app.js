let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listproductHTML = document.querySelector('.listproduct');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.icon-cart span');

let listproduct = [];
let carts = [];


iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});


const addDataToHTML = () => {
    listproductHTML.innerHTML = '';
    if (listproduct.length > 0) {
        listproduct.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('items');
            newProduct.dataset.id = product.id;
            newProduct.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <div>${product.price} Rs.</div>
                <button class="addCart">Add To Cart</button>
            `;
            listproductHTML.appendChild(newProduct);
        });



    }
}
listproductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')) {
        let product_id = positionClick.parentElement.dataset.id;
        addToCart(product_id);
    }
});

const addToCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id);
    if (carts.length <= 0) {
        carts = [{
            product_id: product_id,
            quantity: 1
        }]
    } else if (positionThisProductInCart < 0) {
        carts.push({
            product_id: product_id,
            quantity: 1

        });

    } else {
        carts[positionThisProductInCart].quantity = carts[positionThisProductInCart].quantity + 1;
    }
    addCartToHTML();
    addCartToMemory();

}
const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(carts));
}
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity = totalQuantity + cart.quantity;
            let newCart = document.createElement('div');
            newCart.classList.add('items');
            newCart.dataset.id = cart.product_id;
            let positionProduct = listproduct.findIndex((value) => value.id == cart.product_id);
            let info = listproduct[positionProduct];
            newCart.innerHTML = `
            <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="${info.image}" alt="">
                </div>
                <div class="name">
                    ${info.name}
                </div>
                <div class="totalPrice">
                    ${info.price * cart.quantity}
                </div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>${cart.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;
            listCartHTML.appendChild(newCart);

        });
    }
    iconCartSpan.innerText = totalQuantity;
}


listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.parentElement.dataset.id;
        let type = 'minus';
        if (positionClick.classList.conatins('plus')) {
            type = 'plus';
        }
        changeQuantity(product_id, type);



    }
});
const changeQuantity = (product_id, type) => {
    let positionItemCart = carts.findIndex((value) => value.product_id == product_id);
    if (positionItemCart >= 0) {
        switch (type) {
            case 'plus':
                carts[positionItemCart].quantity = carts[positionItemCart].quantity + 1;
                break;
            default:
                let valueChange = carts[positionItemCart].quantity - 1;
                if (valueChange > 0) {
                    carts[positionItemCart].quantity = valueChange;

                } else {
                    carts.splice(positionItemCart, 1);
                }
                break;
        }
    }
    addCartToMemory();
    addCartToHTML();
}
const initApp = () => {
    fetch('product.json')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            listproduct = Object.values(data);
            addDataToHTML();

            /*----get cart from memory--*/


            if (localStorage.getItem('cart')) {
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
        .catch(error => {
            console.error('Error fetching product data:', error);
        });
};

initApp();
