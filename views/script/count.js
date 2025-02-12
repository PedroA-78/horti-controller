document.addEventListener('DOMContentLoaded', () => {
    const container = document.body;

    container.addEventListener('click', (event) => {
        const target = event.target;

        if (target.closest('.product_movements') || target.closest('.modal_close')) {
            let itemModal = document.querySelector('.item_modal');
            itemModal.classList.toggle('active');
        }

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

let movements = [];

function productAmountChange(action) {
    const productUnitElement = document.querySelector('._product_unit');
    const productAmountElement = document.querySelector('._product_amount');
    const productMovementsElement = document.querySelector('._product_movements')
    const inputElement = document.querySelector(".product_input input");
    const productAmountValueElement = document.querySelector(".product_amount_value");

    if (!productUnitElement || !productAmountElement || !inputElement || !productAmountValueElement) return;

    const productUnit = productUnitElement.value;
    let productAmount = amountSetType(productAmountElement.value, productUnit);
    let amountEntered = amountSetType(inputElement.value, productUnit);

    if (amountEntered <= 0 || isNaN(amountEntered)) return;

    let amount;
    if (action == "_remove" && productAmount <= amountEntered) { amount = productAmount; } else { amount = amountEntered; }
    movements.push({
        amount: amount, 
        datetime: movementSetDate('/'), 
        type: action == "_add" ? 'Entrada' : 'Saida'
    });
    productMovementsElement.value = JSON.stringify(movements);

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

/**
 * @param {string} spacer 
 * @returns {string}
 */

function movementSetDate(spacer) {
    const today = new Date();
    const date = `${today.getFullYear() + spacer + ("0" + (today.getMonth() + 1)).slice(-2) + spacer + ("0" + today.getDate()).slice(-2)}`;
    const time = `${("0" + today.getHours()).slice(-2)}:${("0" + today.getMinutes()).slice(-2)}:${("0" + today.getSeconds()).slice(-2)}`;

    return `${date} ${time}`;
}

const print = console.log