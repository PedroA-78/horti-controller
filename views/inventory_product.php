<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_count_item">
        <div class="product_box">
            <form action="">
                <div class="product_name">
                    <h2>Hortelã</h2>
                </div>

                <div class="product_preview">
                    <img src="../images/hortela.png">
                </div>

                <div class="product_amount">
                    <p>Estoque atual</p>
                    <p>57<span>UN</span></p>
                </div>

                <div class="product_input">
                    <input type="number" placeholder="Enter weight">
                    <div class="product_input_actions">
                        <p class="_remove"><span class="material-symbols-outlined">remove</span></p>
                        <p class="_add"><span class="material-symbols-outlined">add</span></p>
                    </div>
                </div>

                <div class="product_save">
                    <button type="button">Save Product</button>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>