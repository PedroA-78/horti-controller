<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_add">
        <div class="product_add_box">
            <div class="product_add_header">
                <h2>Add New Product</h2>
            </div>

            <form action="">
                <div class="product_add_name">
                    <label for="">Product Name</label>
                    <input type="text" name="" placeholder="Enter product name">
                </div>

                <div class="product_add_code">
                    <label for="">Code</label>
                    <input type="text" name="" placeholder="Enter product code">
                </div>

                <div class="product_add_category">
                    <label for="">Category</label>
                    <select name="">
                        <option value="">Legumes</option>
                        <option value="">Verduras</option>
                        <option value="">Frutas</option>
                        <option value="">Ovos</option>
                        <option value="">Embalados</option>
                    </select>
                </div>

                <div class="product_add_unit">
                    <label for="">Unit</label>
                    <select name="">
                        <option value="" selected>KG</option>
                        <option value="">UN</option>
                    </select>
                </div>

                <div class="product_add_preview">
                    <label for="">Product Image</label>
                    <input type="file" name="" id="product_preview">
                    <div class="product_add_preview_custom" onclick="product_preview.click()">
                        <span class="material-symbols-outlined">cloud_upload</span>
                        <p>Click to Upload</p>
                        <p></p>
                    </div>
                </div>

                <div class="product_add_actions">
                    <button type="button">Save Product</button>
                    <button type="button">Cancel</button>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>