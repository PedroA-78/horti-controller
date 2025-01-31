<?php 
    include_once "model/classes/inventory.php";

    $inventory = new Inventory('model/database/matriz.db');

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($request, '/'));

    $route = $segments[1] ?? '';
    $id = $segments[2] ?? null;

    switch ($route) {
        case ($route == 'add' OR $route == 'list' OR ($route == 'count' AND !$id)):
            $inventory -> handleRequest($route);
            break;
        case ($route == 'update' OR $route == 'delete' OR ($route == 'count' AND $id)):
            $inventory -> handleRequest($route, $id);
            break;
        default:
            echo "Página não encontrada!";
            break;
    }
?>