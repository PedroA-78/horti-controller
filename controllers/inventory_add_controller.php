<?php
    include_once 'controllers/inventory_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            require_once 'views/inventory_add.php';
            break;
        case 'POST':
            _post('products', [
                'name' => $_POST['product_name'],
                'code' => $_POST['product_code'],
                'amount' => 0,
                'unit' => $_POST['product_unit'],
                'category' => $_POST['product_category'],
                'preview' => $_POST['product_preview']
            ]);

            header('Location: /products/add');
            break;
    }
?>