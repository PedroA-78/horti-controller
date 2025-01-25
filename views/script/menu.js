window.addEventListener("load", () => {
    document.querySelector(".hambuger_menu").addEventListener("click", () => {
        document.querySelector(".header_pages").classList.toggle("active")
    })
})