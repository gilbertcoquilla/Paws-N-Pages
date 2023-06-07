// JavaScript file.js

// Get the modal and the cart items container
const cartModal = document.getElementById('cartModal');
const cartItemsContainer = document.getElementById('cartItems');

// Add event listeners to the "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll('#addToCart');
addToCartButtons.forEach((button) => {
  button.addEventListener('click', handleAddToCart);
});

// Function to handle adding items to the cart
function handleAddToCart(event) {
  const item = event.target.parentNode.parentNode;
  const itemName = item.querySelector('h6').textContent;

  // Check if the item is already in the cart
  const existingItem = cartItemsContainer.querySelector(`tr[data-item="${itemName}"]`);
  if (existingItem) {
    // If the item is already in the cart, increase the quantity
    const quantityCell = existingItem.querySelector('.quantity');
    const quantity = parseInt(quantityCell.textContent, 10);
    quantityCell.textContent = quantity + 1;
  } else {
    // If the item is not in the cart, add a new row
    const newRow = document.createElement('tr');
    newRow.dataset.item = itemName;
    newRow.innerHTML = `
      <td>${itemName}</td>
      <td class="quantity">1</td>
      <td><button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button></td>
    `;
    cartItemsContainer.appendChild(newRow);
  }

  // Show the cart modal
  cartModal.showModal();
}

// Function to remove an item from the cart
function removeItem(button) {
  const row = button.parentNode.parentNode;
  row.remove();
}
// JavaScript file.js

// ...

// Function to remove an item from the cart
function removeItem(button) {
    const row = button.parentNode.parentNode;
    row.remove();
  }
  
  // Handle the checkout button click
  const checkoutBtn = document.getElementById('checkoutBtn');
  checkoutBtn.addEventListener('click', handleCheckout);
  
  function handleCheckout() {
    // Perform any necessary actions before checking out
    // For example, you can submit the cart items to a server for processing
    
    // Clear the cart items
    cartItemsContainer.innerHTML = '';
    
    // Close the cart modal
    cartModal.hideModal();
  }
  
  