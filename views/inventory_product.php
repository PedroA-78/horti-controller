<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script src="/views/script/script.js"></script>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_count_item">
        <div class="product_box">
            <form action="/count" method="POST">
                <div class="product_name">
                    <h2><?= $result['name'] ?></h2>
                </div>

                <div class="product_preview">
                    <img src="<?= "../" . $directory . $result['preview'] ?>">
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

                <div class="product_save">
                    <button type="submit">Save Product</button>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>