<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_movements">
        <div class="movements_container">
            <h2>Movimentações <?= $sector ?>!</h2>
            <div class=""></div>
            <div class="movements">
                <?php foreach($movements as $movement): ?>
                <div class="movement">
                    <div class="movement_symbol">
                        <span class="material-symbols-outlined"><?= $movement['type'] ?></span>
                    </div>
                    <div class="movement_infos">
                        <p class="movement_product_name"><?= $movement['product'] ?></p>
                        <p class="movement_product_amount"><?= $movement['amount'] ?><?= $movement['unit'] ?></p>
                        <p class="movement_user_name"><?= $movement['user'] ?></p>
                        <p class="movement_datetime"><?= $movement['date_time'] ?></p>     
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>