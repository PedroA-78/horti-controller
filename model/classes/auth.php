<?php 
    class Auth {
        public static function handle_login() {
            session_start();
            if (!$_SESSION['user_logged_in']) {
                header('Location: /login');
                exit();
            }
        }
    }
?>