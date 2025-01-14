<?php 
    include_once "controllers/inventory_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];
    $product = isset($product_id) ? $product_id : null;

    switch ($method) {
        case 'GET':
            $directory = 'model/previews/';

            if ($product) {
                $result = _get("products", $product);
                require_once "views/inventory_product.php";
                return;
            }

            $results = _get("products", null);
            require_once "views/inventory_count.php";
            break;
        case 'POST':
            _put("products", [
                'id' => $_POST["_product_id"],
                'amount' => $_POST["_product_amount"]
            ]);

            header("Location: /count");
            break;
    }

?>