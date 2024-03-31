// Selectors
const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
const cartItemsContainer = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');
const cartIcon = document.querySelector('.cart-icon');
const cartCount = document.querySelector('.cart-count');

// Initialize cart items array
let cartItems = [];

// Event listeners
addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCartClicked);
});

// Add to cart function
function addToCartClicked(event) {
    const button = event.target;
    const name = button.dataset.name;
    const price = parseFloat(button.dataset.price);

    addItemToCart(name, price);
    updateCartTotal();
}

// Add item to cart
function addItemToCart(name, price) {
    const itemExists = cartItems.find(item => item.name === name);

    if (itemExists) {
        itemExists.quantity++;
    } else {
        cartItems.push({ name, price, quantity: 1 });
    }

    displayCartItems();
}

// Display cart items
function displayCartItems() {
    cartItemsContainer.innerHTML = '';

    cartItems.forEach(item => {
        const li = document.createElement('li');
        li.innerText = `${item.name} x ${item.quantity} - $${item.price * item.quantity}`;
        cartItemsContainer.appendChild(li);
    });

    updateCartIcon();
}

// Update cart total
function updateCartTotal() {
    const total = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
    cartTotal.innerText = '$' + total.toFixed(2);
}

// Update cart icon
function updateCartIcon() {
    const count = cartItems.reduce((acc, item) => acc + item.quantity, 0);
    cartCount.innerText = count;
}

// Initialize
displayCartItems();
updateCartTotal();
