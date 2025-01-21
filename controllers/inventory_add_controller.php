<?php
    include_once 'includes/connect.php';
    $db = new Database('model/database/matriz.db');

    include_once 'includes/preview.php';
    $preview = new Preview;

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            require_once 'views/inventory_add.php';
            break;
        case 'POST':
            $prev = $preview -> upload($_FILES['product_preview']);

            $db -> create('products', [
                'name' => $_POST['product_name'],
                'code' => $_POST['product_code'],
                'amount' => 0,
                'unit' => $_POST['product_unit'],
                'category' => $_POST['product_category'],
                'preview' => $prev
            ]);

            header('Location: /products/add');
            break;
    }
?>