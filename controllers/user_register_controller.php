<?php 
    include_once 'model/classes/connect.php';
    $db = new Database('model/database/matriz.db');

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            require_once 'views/user_register.php';
            break;
        case 'POST':
            $email = filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL);
            $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

            try {
                $db -> create('users', [
                    'name' => $_POST['user_name'],
                    'email' => $email,
                    'password' => $password,
                    'sector' => $_POST['user_sector']
                ]);
            } catch (\Throwable $e) {
                $notify = [
                    'color' => 'blue',
                    'icon' => 'priority_high',
                    'message' => 'Usuário já cadastrado!'
                ];
                
                require_once 'views/user_login.php';
                return;
            }

            header('Location: /login');
            break;
    }
?>