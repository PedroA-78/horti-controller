window.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".hambuger_menu").addEventListener("click", () => {
        document.querySelector(".header_pages").classList.toggle("active")
    })

    let modal_elements = [
        document.querySelector(".dashboard_newcount"),
        document.querySelector(".dashboard_newcount_cancel")
    ]
    if (modal_elements[0]) {
        modal_elements.forEach(element => {
            element.addEventListener("click", () => {
                document.querySelector(".dashboard_newcount_modal").classList.toggle("active")
            })
        });
    }
})