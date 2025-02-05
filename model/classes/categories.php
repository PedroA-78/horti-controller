<?php 
    include_once "model/classes/connect.php";

    class Category {
        private $db;
        
        public function __construct($databasePath) {
            $this -> db = new Database($databasePath);
        }

        public function handleRequest($action = null) {
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method == 'GET') $this -> handleGet();
            if ($method == 'POST') $this -> handlePost($action);
        }

        private function handleGet() {
            $sector = $this -> db -> read('sectors', ['id' => $_SESSION['user_sector']], "name")[0];
            $categories = $this -> db -> read('categories', ['sector' => $_SESSION['user_sector']]);

            require_once 'views/dashboard_categories.php';
        }

        private function handlePost($action) {
            switch ($action) {
                case 'POST':
                    $this -> addCategory();
                    break;
                case 'UPDATE':
                    $this -> updateCategory();
                    break;
                case 'DELETE':
                    $this -> deleteCategory();
                    break;
            }

            header('Location: /dashboard/categories');
            exit();
        }

        private function addCategory() {
            $this -> db -> create('categories', [
                'name' => $_POST['category'],
                'sector' => $_SESSION['user_sector']
            ]);
        }

        private function updateCategory() {
           $this -> db -> update('categories', [
                'name' => $_POST['category']
           ], ['id' => $_POST['_id']]);
        }

        private function deleteCategory() {
            $this -> db -> delete('categories', ['id' => $_POST['_id']]);
        }
    }
?>