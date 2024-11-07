fetch('../../globalPHP/databaseSAcc.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }
            return response.json();
    })
    .then(jsons => {
        const containerProducts = document.querySelector(".container_products");
        jsons.forEach(json => {
            if (json.category === "Smartphone Accessories") {
                const productWrapper = document.createElement("a");
                productWrapper.href = `../../product/php/product.php?&id=${json.id}`;
                productWrapper.classList.add("product-wrapper");
                containerProducts.appendChild(productWrapper);
                productWrapper.addEventListener("click", ()=> {
                    window.location.href = `../../product/php/product.php?id=${json.id}`; // Loads the new page and refreshes everything
                });

                const imageProduct = document.createElement("img");
                imageProduct.src = json.image;
                productWrapper.appendChild(imageProduct);

                const titleProduct = document.createElement("h1");
                titleProduct.classList.add("title_product");
                titleProduct.textContent = json.title;
                productWrapper.appendChild(titleProduct);

                const descriptionProduct = document.createElement("p");
                descriptionProduct.classList.add("description_product");
                descriptionProduct.textContent = json.description;
                productWrapper.appendChild(descriptionProduct);

                const priceProduct = document.createElement("p");
                priceProduct.classList.add("price_product");
                priceProduct.textContent = "$" + json.price;
                productWrapper.appendChild(priceProduct);
            }
        });
    })
    .catch(error => console.error('Error:', error));