<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script src="/views/script/search.js"></script>
</head>
<body>
    <?php include_once 'includes/header.php'?>
    <main class="page_products">
        <div class="products_search">
            <form action="/inventory/list" method="GET">
                <div class="search_text">
                    <input type="text" name="search" placeholder="Search for name, code or category">
                    <button type="submit"><span class="material-symbols-outlined">search</span></button>
                </div>
                <div class="search_category">

                </div>
            </form>
            <div class="search_by">

            </div>
        </div>
        <div class="products_cards">
            <?php foreach ($results as $product): ?>
            <div class="products_card" id="<?= $product['id'] ?>">
                <div class="products_name">
                    <p><?= $product['name'] ?></p>
                </div>
                <div class="products_preview">
                    <img src="<?= "../" . $directory . $product['preview'] ?>">
                </div>
                <div class="products_actions">
                    <a href="/inventory/update/<?= $product['id'] ?>"><span class="material-symbols-outlined">edit_square</span></a>
                    <a href="/inventory/delete/<?= $product['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include_once 'includes/footer.php' ?>
</body>
</html>