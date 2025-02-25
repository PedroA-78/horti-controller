<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>
<body>
    <div class="products_search">
        <form action="/search" method="POST">
            <input type="text" name="search">
            <button type="submit">Pesquisar</button>
        </form>
    </div>
    <div class="products_result" style="width: 80%; margin: 0 auto; padding: 16px; display: grid; grid-template-columns: 25% 25% 25% 25%; gap: 8px;">
        <?php foreach ($results as $product): ?>
        <div class="" style="width: 100%; margin: 6px auto; border: 1px solid; border-radius: 12px; text-align: center;">
            <h2><?= $product['name'] ?></h2>
            <p>Code: <?= $product['code'] ?></p>
            <p>Amount: <?= $product['amount'] ?></p>
            <p>Category: <?= $product['category'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>