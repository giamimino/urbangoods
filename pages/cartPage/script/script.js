fetch('../php/db-con.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json();
    })
    .then(jsons => {
        const table = document.getElementById("table_js");
        let rows = ''; // Create a variable to hold the rows
        let totalPrice = 0; // Initialize total price variable

        jsons.forEach(json => {
            if (json.isCart === "1") { // Check if isCart is a number (1 for true)
                const itemTotal = parseFloat(json.price) * json.quantity; // Calculate item total
                totalPrice += itemTotal; // Add item total to the overall total price

                rows += `
                <tr>
                    <td class="article">
                        <img class="table-image-thumbnail" src="${json.image}">
                        <span>
                            <h4>${json.title}</h4>
                            <button class="remove-btn">Remove</button>
                        </span>
                    </td>
                    <td>
                        $${json.price}
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="number" min="1" max="15" value="${json.quantity}" id="quantity-input-${json.id}" class="quantity-input">
                            <button class="check-btn" type="button" data-id="${json.id}"> 
                                <i class='bx bx-check'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                `;
            }
        });

        // Use insertAdjacentHTML to append the rows to the table
        table.insertAdjacentHTML('beforeend', rows); // Append the rows to the table

        // Set total price display
        document.getElementById("amount").textContent = "$" + totalPrice.toFixed(2);
        document.getElementById("total").textContent = "$" + totalPrice.toFixed(2);

        // Update PayPal form amount
        document.querySelector('input[name="amount"]').value = totalPrice.toFixed(2);
        const buyPaypal = document.querySelector(".price-shipping");
        buyPaypal.addEventListener("click", (amount)=> {
                document.querySelector('input[name="amount"]').value = amount;
        });
        
        // Add event listeners to check buttons
        const checkButtons = document.querySelectorAll('.check-btn');
        checkButtons.forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-id'); // Get the item ID
                const quantityInput = document.getElementById(`quantity-input-${itemId}`);
                const quantity = quantityInput.value;

                // Send the updated quantity to the server
                fetch('../php/update-quantity.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: itemId, quantity: quantity }) // Send id and quantity as JSON
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message); // Notify user of success
                        // Recalculate totalPrice
                        // You may want to update totalPrice based on the new quantities here
                    } else {
                        alert('Error: ' + data.message); // Notify user of error
                    }
                })
                .catch(error => console.error('Error updating quantity:', error));
            });
        });

        // Add event listeners to remove buttons
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const row = button.closest('tr'); // Get the closest row to the button
                const itemId = row.querySelector('.quantity-input').id.split('-')[2]; // Extract item ID from the input ID

                // Send the remove request to the server
                fetch('../php/remove.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: itemId }) // Send the product ID
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message); // Notify user of success
                        row.remove(); // Remove the row from the DOM
                        // Update total price accordingly
                    } else {
                        console.error('Error:', data.message);
                        alert(data.message); // Notify user of error
                    }
                })
                .catch(error => console.error('Error removing product:', error));
            });
        });
    })
    .catch(error => console.error('Error:', error));
