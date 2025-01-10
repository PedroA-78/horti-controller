<?php
    include 'controllers/inventory_controller.php';
    include 'controllers/preview_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $product = isset($product_id) ? $product_id : null;

    routes($method, $product);

    function routes($method, $product) {
        switch ($method) {
            case 'GET':
                $directory = 'model/previews/';
                $result = _get('products', $product);
                require 'views/inventory_update.php';
                break;
        }
    }

?>