<?php 
    include_once "model/classes/auth.php";
    include_once "model/classes/connect.php";
    include_once "model/classes/categories.php";

    class Dashboard {
        private $db;
        private $category;

        public function __construct($databasePath) {
            Auth::handle_login();
            $this -> category = new Category($databasePath);
        }

        public function handleRequest($page) {
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method == "GET") $this -> handleGet($page);
            if ($method == "POST") $this -> handlePost($page);
        }

        private function handleGet($page) {
            switch ($page) {
                case 'main':
                    $user = $_SESSION['user_name'];
                    require_once 'views/dashboard.php';
                    break;
                case 'categories':
                    $this -> category -> handleRequest();
                    break;
            }
        }

        private function handlePost($page) {
            switch ($page) {
                case 'categories':
                    $this -> category -> handleRequest($_POST['_method']);
                    break;
            }
        }
            
    }
?>