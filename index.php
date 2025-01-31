<?php 
    $paths = [
        'dashboard' => 'controllers/dashboard_controller.php',
        'inventory' => 'controllers/inventory_controller.php',
        'register' => 'controllers/user_register_controller.php',
        'login' => 'controllers/user_login_controller.php'
    ];

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($request, '/'));

    $route = $segments[0] ?? null;

    switch ($route) {
        case '':
            header('Location: /dashboard');
            break;
        case array_key_exists($route, $paths):
            require $paths[$route];
            break;
        case 'logout':
            session_start();
            session_destroy();
            header('Location: /login');
            break;
        default:
            echo "Página não encontrada!";
            break;
    }
?>

