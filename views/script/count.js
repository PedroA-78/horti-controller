document.addEventListener('DOMContentLoaded', () => {
    const container = document.body;

    container.addEventListener('click', (event) => {
        const target = event.target;

        if (target.closest('.products_card')) {
            const card = target.closest('.products_card');
            const productId = card.getAttribute('id');
            
            if (productId) {
                window.location.href = `/inventory/count/${productId}`;
            }
        }

        if (target.closest('.product_input_actions p')) {
            const input = target.closest('.product_input_actions p');
            const action = input.classList.contains('_remove') ? '_remove' : '_add';
            productAmountChange(action);
        }
    })
})

/**
 * @param {string} action - Ação a ser executada (_add ou _remove)
 */

function productAmountChange(action) {
    const productUnitElement = document.querySelector('._product_unit');
    const productAmountElement = document.querySelector('._product_amount');
    const inputElement = document.querySelector(".product_input input");
    const productAmountValueElement = document.querySelector(".product_amount_value");

    if (!productUnitElement || !productAmountElement || !inputElement || !productAmountValueElement) return;

    const productUnit = productUnitElement.value;
    let productAmount = amountSetType(productAmountElement.value, productUnit);
    let amountEntered = amountSetType(inputElement.value, productUnit);

    if (amountEntered <= 0 || isNaN(amountEntered)) return;


    productAmount = action == "_remove" ? Math.max(0, productAmount - amountEntered) : productAmount + amountEntered;
    productAmount = productUnit == "KG" ? productAmount.toFixed(2) : productAmount;

    productAmountElement.value = productAmount;
    productAmountValueElement.innerHTML = `${productAmount}<span>${productUnit}</span>`;
    inputElement.value = "";
}

/**
 * @param {string} number - Valor a ser convertido
 * @param {string} unit - Unidade de medida (KG ou unidade)
 * @returns {number} valor convertido
 */

function amountSetType(number, unit) {
    return unit == "KG" ? parseFloat(number) : parseInt(number, 10);
}

const print = console.log