<?php 
    $routes = [
        '/home' => 'views/home.php',
        '/count' => 'views/inventory_count.php',
        '/products' => 'controllers/inventory_list_controller.php',
        '/products/add' => 'controllers/inventory_add_controller.php'
    ];

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $count = preg_match('#^/count/(\d+)$#', $path, $count_item);
    $update = preg_match('#^/products/(\d+)/update$#', $path, $update_item);
    $delete = preg_match('#^/products/(\d+)/delete$#', $path, $delete_item);

    switch ($path) {
        case '/':
            header('Location: /home');
            break;
        case array_key_exists($path, $routes):
            require $routes[$path];
            break;
        case $count === 1:
            require 'views/inventory_product.php';
            break;
        case $update === 1:
            $product_id = $update_item[1];
            $route = 'UPDATE';
            require 'controllers/inventory_list_controller.php';
            break;
        case $delete === 1:
            $product_id = $delete_item[1];
            $route = 'DELETE';
            require 'controllers/inventory_list_controller.php';
            break;
        default:
            echo "Página não encontrada!";
            break;
    }
?>

