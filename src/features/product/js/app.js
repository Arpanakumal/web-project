let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listproductHTML = document.querySelector('listproduct');

let listproduct = [];


iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart')
})

closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart')
})


const addDataTiHTML = () => {
    listproductHTML.innerHTML = '';
    if (listproduct.length > 0) {
        listproduct.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('items');
            newProduct.innerHTML = `
            <img src="${product.image}">
                <h2>${product.name}e</h2>
                <div class="${product.price}"</div>
                <button class="addCart">Add To Cart
                </button>
                `;
            listproductHTML.appendChild(newProduct);

        })
    }
}
const initApp = () => {
    /*-- get data from json----*/
    fetch('product.json')
    the(response => response.json())
    then(data => {
        listproduct = data;
        console.log(listproduct);
        addDataToHTML();
    })

}
initApp();