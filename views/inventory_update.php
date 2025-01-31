<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="../../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_add">
        <div class="product_add_box">
            <div class="product_add_header">
                <h2>Update Product</h2>
            </div>

            <form action="/inventory/update" method="POST" enctype="multipart/form-data">
                <div class="product_add_name">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" placeholder="Enter product name" value="<?= $result['name'] ?>" required>
                </div>

                <div class="product_add_code">
                    <label for="">Code</label>
                    <input type="text" name="product_code" placeholder="Enter product code" value="<?= $result['code'] ?>">
                </div>

                <div class="product_add_category">
                    <label for="">Category</label>
                    <select name="product_category" required>
                        <option value="Legumes" <?= $result['category'] == 'Legumes' ? 'selected' : '' ?>>Legumes</option>
                        <option value="Verduras" <?= $result['category'] == 'Verduras' ? 'selected' : '' ?>>Verduras</option>
                        <option value="Frutas" <?= $result['category'] == 'Frutas' ? 'selected' : '' ?>>Frutas</option>
                        <option value="Ovos" <?= $result['category'] == 'Ovos' ? 'selected' : '' ?>>Ovos</option>
                        <option value="Embalados" <?= $result['category'] == 'Embalados' ? 'selected' : '' ?>>Embalados</option>
                    </select>
                </div>

                <div class="product_add_unit">
                    <label for="">Unit</label>
                    <select name="product_unit" required>
                        <option value="KG" <?= $result['unit'] == 'KG' ? 'selected' : '' ?>>KG</option>
                        <option value="UN" <?= $result['unit'] == 'UN' ? 'selected' : '' ?>>UN</option>
                    </select>
                </div>

                <div class="product_add_preview">
                    <label for="">Product Image</label>
                    <input type="file" name="product_preview" id="product_preview" accept=".png, .jpeg, .jpg, .svg">
                    <div class="product_add_preview_custom" onclick="product_preview.click()">
                        <span class="material-symbols-outlined">cloud_upload</span>
                        <p>Click to Upload</p>
                        <p class="product_add_preview_name"></p>
                    </div>
                </div>

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_product" value="<?= $result['id'] ?>">

                <div class="product_add_actions">
                    <button type="submit">Save Product</button>
                    <a href="/inventory/list">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>