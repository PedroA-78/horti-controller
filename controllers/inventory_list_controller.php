<?php 
    include_once 'controllers/inventory_controller.php';
    include_once 'controllers/preview_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $product = isset($product_id) ? $product_id : null;
    $route = isset($route) ? $route : null;

    switch ($method) {
        case 'GET':
            $directory = 'model/previews/';
            if ($product) {
                $result = _get('products', $product);

                if ($route == "UPDATE") {
                    require_once 'views/inventory_update.php';
                } elseif ($route == "DELETE") {
                    require_once 'views/inventory_delete.php';
                }

                return;
            }

            $results = _get('products', null);
            require_once 'views/inventory_list.php';

            break;
        case 'POST':
            $method = $_POST['_method'];

            if ($method == 'PUT') {
                $preview = _replace($_FILES['product_preview'], $_POST['_product']);

                _put("products",[
                    'id' => $_POST['_product'],
                    'name' => $_POST['product_name'],
                    'code' => $_POST['product_code'],
                    'unit' => $_POST['product_unit'],
                    'category' => $_POST['product_category'],
                    'preview' => $preview
                ]);
            } elseif ($method == 'DELETE') {
                _remove($_POST['_product']);

                _delete("products", $_POST['_product']);
            }

            header('Location: /products');
            
            break;
    }
?>