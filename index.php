<?php 
    $routes = [
        '/home' => 'views/home.php',
        '/count' => 'views/inventory_count.php',
        '/products' => 'views/inventory_list.php',
        '/products/add' => 'controllers/inventory_add_controller.php'
    ];

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $count = preg_match('#^/count/(\d+)$#', $path, $count_item);

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
        default:
            echo "Página não encontrada!";
            break;
    }
?>

