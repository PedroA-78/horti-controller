<?php
    include_once 'model/classes/auth.php';
    Auth::handle_login();

    include_once 'model/classes/connect.php';
    $db = new Database('model/database/matriz.db');

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            $user = $_SESSION['user_name'];
            require_once 'views/dashboard.php';
            break;
        case 'POST':
            if ($_POST['action'] == 'newcount') {
                if ($_POST['confirm'] == "nova contagem") {
                    // echo json_encode($_SESSION);
                    $test = $db -> update('products', ['amount' => 0], ['sector' => $_SESSION['user_sector']]);
                    header('Location: /count');
                }
            }
            break;
    }
?>