window.addEventListener("load", () => {
    select(".hambuger_menu").addEventListener("click", () => {
        select(".header_pages").classList.toggle("active")
    })

    let modal_elements = [
        select(".dashboard_newcount"),
        select(".dashboard_newcount_cancel")
    ]
    if (modal_elements[0]) {
        modal_elements.forEach(element => {
            element.addEventListener("click", () => {
                select(".dashboard_newcount_modal").classList.toggle("active")
            })
        });
    }
})

function select(elem) {
    return document.querySelector(elem)
}