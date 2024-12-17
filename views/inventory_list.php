<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <link rel="stylesheet" href="views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <header>
        <div class="header_logo">
            <a href="/home">
                <span class="material-symbols-outlined">package_2</span>
                LightInv
            </a>
        </div>
        <div class="header_pages">
            <a href="/inventory">Inventory List</a>
            <a href="">Inventory Count</a>
            <a href="">Add Product</a>
        </div>
    </header>
    <main>
        <div class="products_cards">
            <div class="products_card">
                <div class="products_name">
                    <p>Laranja Pera</p>
                </div>
                <div class="products_preview">
                    <img src="images/laranja_pera.png">
                </div>
                <div class="products_actions">
                    <a href=""><span class="material-symbols-outlined">edit_square</span></a>
                    <a href=""><span class="material-symbols-outlined">delete</span></a>
                </div>
            </div>
            <div class="products_card">
                <div class="products_name">
                    <p>Hortelã</p>
                </div>
                <div class="products_preview">
                    <img src="images/hortela.png">
                </div>
                <div class="products_actions">
                    <a href=""><span class="material-symbols-outlined">edit_square</span></a>
                    <a href=""><span class="material-symbols-outlined">delete</span></a>
                </div>
            </div>
            <div class="products_card">
                <div class="products_name">
                    <p>Banana Naninca</p>
                </div>
                <div class="products_preview">
                    <img src="images/banana_nanica.png">
                </div>
                <div class="products_actions">
                    <a href=""><span class="material-symbols-outlined">edit_square</span></a>
                    <a href=""><span class="material-symbols-outlined">delete</span></a>
                </div>
            </div>
            <div class="products_card">
                <div class="products_name">
                    <p>Alface Crespa</p>
                </div>
                <div class="products_preview">
                    <img src="images/alface_crespa.png">
                </div>
                <div class="products_actions">
                    <a href=""><span class="material-symbols-outlined">edit_square</span></a>
                    <a href=""><span class="material-symbols-outlined">delete</span></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>