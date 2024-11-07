document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id'); // Get product ID from URL

    fetch(`../php/db-product.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(json => {
            // Update the page with product details
            document.title = json.title;
            document.querySelector(".title_product").textContent = json.title;
            document.querySelector(".description_product").textContent = json.description;
            document.querySelector(".price_product").textContent = "$" + json.price;
            document.getElementById("image_product").src = json.image;
            document.querySelector(".main_description").textContent = json.main_description;
            document.querySelector(".main_description").innerHTML = document.querySelector(".main_description").innerHTML.replace(/✅/g, '<br>✅');

            // Check if product is already in cart
            let cartListArrID = JSON.parse(localStorage.getItem('id')) || [];
            const isCart = cartListArrID.includes(id); // Check if the product is in the cart

            // Add event listener for the "Add to Cart" button
            const addcart = document.getElementById("addcart");
            addcart.addEventListener("click", () => {
                const selectedQuantity = document.getElementById("fruits").value;
                sendDataToServer(isCart, selectedQuantity, id);
            });
        })
        .catch(error => console.error('Error:', error));
});

// Function to send data to the server
function sendDataToServer(isCartBo, quantity, productId) {
    fetch('../php/add-to-cart.php', {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ isCart: isCartBo, quantity: quantity, productId: productId }) // Include product ID
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json(); 
    })
    .then(data => {
        console.log('Success:', data);
        alert(data.message); // Notify user with server response
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


// Optional: Display selected quantity (if needed)
function displaySelection() {
    const selectedQuantity = document.getElementById("fruits").value;
    console.log("Selected quantity:", selectedQuantity);
}
