<?php
    include_once "model/classes/dashboard.php";
    $dashboard = new Dashboard('model/database/matriz.db');

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($request, '/'));

    $route = $segments[1] ?? '';

    switch ($route) {
        case ($route == 'main' 
        OR $route == 'categories' 
        OR $route == 'movements'
        OR $route == 'newcount'
        OR $route == 'backups' ):
            $dashboard -> handleRequest($route);
            break;
        default:
            echo "Página não encontrada";
            break;
    }
?>