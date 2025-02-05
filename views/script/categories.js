document.addEventListener('DOMContentLoaded', () => {
    setupNewCategory();
    setupCategoryUpdate();
    setupCategoryDelete();
})

function setupNewCategory() {
    let newCategoryButton = document.querySelector('.new_category button');
    let categories = document.querySelector('.categories');

    newCategoryButton.addEventListener('click', () => {
        if (document.querySelector('.new_category_form')) return;

        let formHTML = `
            <div class="category new_category_form">
                <form action="/dashboard/categories" method="POST">
                    <input type="text" name="category" placeholder="Insert category name" required>
                    <div class="new_category_actions">
                        <span class="material-symbols-outlined" onclick="new_category_submit.click()">check</span>
                        <span class="material-symbols-outlined new_category_cancel">close</span>
                        <button type="submit" id="new_category_submit"></button>
                    </div>
                    <input type="hidden" name="_method" value="POST">
                </form>
            </div>
        `;
        
        categories.insertAdjacentHTML('beforeend', formHTML);

        document.querySelector('.new_category_cancel').addEventListener('click', () => {
            document.querySelector('.new_category_form').remove();
        })
    })
}

function setupCategoryUpdate() {
    document.querySelectorAll('.category_update').forEach(element => {
        element.addEventListener('click', () => {
            if (document.querySelector('.category_update_cancel')) return;

            let category = element.closest('.category');
            let categoryId = category.getAttribute('id');


            let oldHTML = category.innerHTML
            console.log(oldHTML)
            let formHTML = `
                <form action="/dashboard/categories" method="POST">
                    <input type="text" name="category" placeholder="New category name" required>
                    <div class="new_category_actions">
                        <span class="material-symbols-outlined" onclick="category_update_submit.click()">check</span>
                        <span class="material-symbols-outlined category_update_cancel">close</span>
                        <button type="submit" id="category_update_submit"></button>
                    </div>
                    <input type="hidden" name="_id" value="${categoryId}">
                    <input type="hidden" name="_method" value="UPDATE">
                </form>
            `;

            category.innerHTML = formHTML;

            document.querySelector('.category_update_cancel').addEventListener('click', () => {
                category.innerHTML = oldHTML;
                setupCategoryUpdate();
            })
        })
    })
}

function setupCategoryDelete() {
    document.querySelectorAll('.category_delete').forEach(element => {
        element.addEventListener('click', () => {
            element.closest('form').submit();
        })
    })
}