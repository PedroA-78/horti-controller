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
                <h2>Delete Product</h2>
            </div>

            <form action="/inventory/delete" method="POST" enctype="multipart/form-data">
                <div class="product_add_name">
                    <label for="">Product Name</label>
                    <input type="text" value="<?= $result['name'] ?>" readonly>
                </div>

                <div class="product_add_code">
                    <label for="">Code</label>
                    <input type="text" value="<?= $result['code'] ?>" readonly>
                </div>

                <div class="product_add_category">
                    <label for="">Category</label>
                    <input type="text" value="<?= $result['category']?>" readonly>
                </div>

                <div class="product_add_unit">
                    <label for="">Unit</label>
                    <input type="text" value="<?= $result['unit'] ?>" readonly>
                </div>

                <div class="product_add_preview">
                    <label for="">Product Image</label>
                    <img src="<?= "../../" . $directory . $result['preview'] ?>">
                </div>

                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_product" value="<?= $result['id'] ?>">

                <div class="product_delete_actions">
                    <button type="submit">Delete Product</button>
                    <a href="/inventory/list">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>