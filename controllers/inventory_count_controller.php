<?php 
    include_once 'model/classes/auth.php';
    Auth::handle_login();

    include_once 'model/classes/connect.php';
    $db = new Database('model/database/matriz.db');

    $method = $_SERVER['REQUEST_METHOD'];
    $product = isset($product_id) ? $product_id : null;

    switch ($method) {
        case 'GET':
            $directory = 'model/previews/';

            if ($product) {
                $result = $db -> read('products', ['id' => $product])[0];
                require_once "views/inventory_product.php";
                return;
            }

            $results = $db -> read('products', ['sector' => $_SESSION['user_sector']]);

            require_once "views/inventory_count.php";
            break;
        case 'POST':
            $db -> update('products', ['amount' => $_POST["_product_amount"]], ['id' => $_POST['_product_id']]);

            header("Location: /count");
            break;
    }

?>