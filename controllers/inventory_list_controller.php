<?php 
    include_once 'controllers/inventory_controller.php';
    include_once 'controllers/preview_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            $directory = "model/previews/";
            $results = _get('products', null);
            require_once 'views/inventory_list.php';
            break;
        case 'POST':
            $method = $_POST['_method'];

            if (isset($method) == 'PUT') {
                $preview = _replace($_FILES['product_preview'], $_POST['_product']);

                _put("products",[
                    'id' => $_POST['_product'],
                    'name' => $_POST['product_name'],
                    'code' => $_POST['product_code'],
                    'unit' => $_POST['product_unit'],
                    'category' => $_POST['product_category'],
                    'preview' => $preview
                ]);

                header('Location: /products');
            }
            break;
    }
?>