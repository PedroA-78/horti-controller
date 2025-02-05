<?php
    include_once "model/classes/dashboard.php";
    $dashboard = new Dashboard('model/database/matriz.db');

    $method = $_SERVER['REQUEST_METHOD'];

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($request, '/'));

    $route = $segments[1] ?? '';

    switch ($route) {
        case ($route == 'main' OR $route == 'categories'):
            $dashboard -> handleRequest($route);
            break;
        default:
            echo "Página não encontrada";
            break;
    }
?>