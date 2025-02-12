<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script src="/views/script/count.js"></script>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_count_item">
        <div class="count_item_container">
            <form action="/inventory/count/<?= $result['id'] ?>" method="POST">
                <div class="product_movements">
                    <span class="material-symbols-outlined">manage_search</span>
                </div>

                <div class="product_name">
                    <h2><?= $result['name'] ?></h2>
                </div>

                <div class="product_preview">
                    <img src="<?= "../../" . $directory . $result['preview'] ?>">
                </div>

                <div class="product_amount">
                    <p>Estoque atual</p>
                    <p class="product_amount_value"><?= $result['amount'] ?><span><?= $result['unit'] ?></span></p>
                </div>

                <div class="product_input">
                    <input type="number" placeholder="Enter weight" >
                    <div class="product_input_actions">
                        <p class="_remove"><span class="material-symbols-outlined">remove</span></p>
                        <p class="_add"><span class="material-symbols-outlined">add</span></p>
                    </div>
                </div>

                <input type="hidden" name="_product_id" value="<?= $result['id'] ?>">
                <input type="hidden" class="_product_amount" name="_product_amount" value="<?= $result['amount'] ?>">
                <input type="hidden" class="_product_unit" name="_product_unit" value="<?= $result['unit'] ?>">
                <input type="hidden" class="_product_movements" name="_product_movements" value="">

                <div class="product_save">
                    <a href="/inventory/count">Cancel</a>
                    <button type="submit">Save Product</button>
                </div>
            </form>
        </div>

        <div class="item_modal">
            <div class="item_modal_container">
                <div class="modal_close">
                    <span class="material-symbols-outlined">close</span>
                </div>
                <div class="item_movements">
                    <?= !$movements ? '<div class="no_movements"><p>Este produto não tem movimentações!</p></div>' : ''; ?>
                    <?php foreach($movements as $movement): ?>
                    <div class="item_movement">
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
            </div>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>