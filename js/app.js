//search items
const searchInput = document.getElementById('search_box');
const products = document.querySelectorAll('.product');

function filterProducts() {
    const query = searchInput.value.toLowerCase();

    products.forEach(product => {
        let foundMatch = false;
        
        const product_name = product.children[1].children[0].textContent.toLowerCase();
            if (product_name.includes(query)) {
                foundMatch = true;
            }

        if (foundMatch) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}
searchInput.addEventListener('input', filterProducts);