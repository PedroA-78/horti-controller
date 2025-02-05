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
                    <label>Product Name</label>
                    <input type="text" name="product_name" placeholder="Enter product name" value="<?= $result['name'] ?>" required>
                </div>

                <div class="product_add_code">
                    <label>Code</label>
                    <input type="text" name="product_code" placeholder="Enter product code" value="<?= $result['code'] ?>">
                </div>

                <div class="product_add_category">
                    <label>Category</label>
                    <select name="product_category" required>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $result['category'] == $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="product_add_unit">
                    <label>Unit</label>
                    <select name="product_unit" required>
                        <option value="KG" <?= $result['unit'] == 'KG' ? 'selected' : '' ?>>KG</option>
                        <option value="UN" <?= $result['unit'] == 'UN' ? 'selected' : '' ?>>UN</option>
                    </select>
                </div>

                <div class="product_add_preview">
                    <label>Product Image</label>
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