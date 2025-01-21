<?php 
    include_once 'includes/connect.php';
    $db = new Database("model/database/matriz.db");

    include_once 'includes/preview.php';
    $preview = new Preview;

    $method = $_SERVER['REQUEST_METHOD'];
    $product = isset($product_id) ? $product_id : null;
    $route = isset($route) ? $route : null;

    switch ($method) {
        case 'GET':
            $directory = 'model/previews/';

            if ($product) {
                $result = $db -> read('products', ['id' => $product])[0];

                if ($route == "UPDATE") {
                    require_once 'views/inventory_update.php';
                } elseif ($route == "DELETE") {
                    require_once 'views/inventory_delete.php';
                }

                return;
            }

            $results = $db -> read('products', []);
            require_once 'views/inventory_list.php';

            break;
        case 'POST':
            $method = $_POST['_method'];

            if ($method == 'PUT') {
                $prev = $preview -> replace($_FILES['product_preview'], $_POST['_product']);

                $db -> update('products', [
                    'name' => $_POST['product_name'],
                    'code' => $_POST['product_code'],
                    'unit' => $_POST['product_unit'],
                    'category' => $_POST['product_category'],
                    'preview' => $prev
                ], ['id' => $_POST['_product']]);
            } elseif ($method == 'DELETE') {
                $preview -> remove($_POST['_product']);

                $db -> delete('products', ['id' => $_POST['_product']]);
            }

            header('Location: /products');
            
            break;
    }
?>