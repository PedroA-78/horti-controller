<?php 
    $routes = [
        '/home' => 'views/home.php',
        '/products' => 'views/inventory_list.php'
    ];

    $path = $_SERVER['REQUEST_URI'];

    switch ($path) {
        case '/':
            header('Location: /home');
            break;
        case array_key_exists($path, $routes):
            require $routes[$path];
            break;
        default:
            echo "Página não encontrada!";
            break;
    }
?>

