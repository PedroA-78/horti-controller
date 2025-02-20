<?php 
    include_once 'model/classes/connect.php';
    $db = new Database('model/database/matriz.db');

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            require_once 'views/user_login.php';
            break;
        case 'POST':
            $email = filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL);
            
            $user = $db -> read('users', ['email' => $email])[0];

            if ($user && password_verify($_POST['user_password'], $user['password'])) {
                session_start();
                session_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_sector'] = $user['sector'];
                $_SESSION['user_logged_in'] = true;

                header('Location: /dashboard/main');
            } else {
                $notify = [
                    'icon' => 'close',
                    'message' => 'Dados Incorretos!'
                ];
                require_once 'views/user_login.php';
            }
            break;
    }
?>