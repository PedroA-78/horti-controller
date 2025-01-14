window.addEventListener('load', () => {
    let cards = document.querySelectorAll('.products_card')

    if (cards) {
        cards.forEach((card) => {
            card.addEventListener("click", () => {
                window.location.href = `count/${card.getAttribute('id')}`
            })
        })
    }

    let actions = document.querySelectorAll('.product_input_actions p')
    if (actions) {
        actions.forEach((action) => {
            action.addEventListener("click", () => {
                product_amount_change(action.classList)
            })
        })
    }
})

function product_amount_change(action) {
    let product_unit = document.querySelector("._product_unit").value
    let product_amount = amount_set_type(document.querySelector("._product_amount").value, product_unit)
    let amount_entered = amount_set_type(document.querySelector(".product_input input").value, product_unit)

    if (amount_entered <= 0 || isNaN(amount_entered)) return

    if (action == "_remove") {
        product_amount -= amount_entered
    } else if (action == "_add") {
        product_amount += amount_entered
    }

    if (product_amount < 0) product_amount = 0
    product_amount = product_unit == "KG" ? product_amount.toFixed(2) : product_amount
    document.querySelector("._product_amount").value = product_amount
    document.querySelector(".product_amount_value").innerHTML = `${product_amount}<span>${product_unit}</span>`
    document.querySelector(".product_input input").value = ""
}

function amount_set_type(number, unit) {
    if (unit == "KG") {
        return parseFloat(number)
    }
    
    return parseInt(number)
}

function print(str) {
    console.log(str)
}