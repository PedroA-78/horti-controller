<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script src="../views/script/categories.js"></script>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_categories">
        <div class="categories_container">
            <h2>Categorias <?= $sector['name'] ?>!</h2>
            <div class="categories">
                <?php foreach ($categories as $category): ?>
                <div class="category" id="<?= $category['id'] ?>">
                    <p><?= $category['name'] ?></p>
                    <div class="category_actions">
                        <span class="material-symbols-outlined category_update">edit_square</span>
                        <form action="/dashboard/categories" method="POST">
                            <span class="material-symbols-outlined category_delete">delete</span>
                            <input type="hidden" name="_id" value="<?= $category['id'] ?>">
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="new_category">
                <button type="button">Nova categoria</button>
            </div>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>