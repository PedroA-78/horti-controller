<?php 
    include_once "model/classes/auth.php";
    include_once "model/classes/connect.php";
    include_once "model/classes/preview.php";

    class Inventory {
        private $db;
        private $preview;
        private $directory = 'model/previews/';

        public function __construct($databasePath) {
            Auth::handle_login();
            $this -> db = new Database($databasePath);
            $this -> preview = new Preview();
        }

        public function handleRequest($action, $id = null) {
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method == 'GET') $this -> handleGet($action, $id);
            if ($method == 'POST') $this -> handlePost($action, $id);
        }

        private function handleGet($action, $id) {
            if (!$action) $action = 'none';

            switch ($action) {
                case 'add':
                    require_once 'views/inventory_add.php';
                    break;
                case 'list':
                    $results = $this -> searchProduct();
                    $directory = $this -> directory;
                    require_once 'views/inventory_list.php';
                    break;
                case 'count':
                    $directory = $this -> directory;

                    if ($id) {
                        $result = $this -> db -> read('products', ['id' => $id])[0];
                        require_once 'views/inventory_product.php';
                        return;
                    }

                    $results = $this -> searchProduct();
                    require_once 'views/inventory_count.php';
                    break;
                case ($action == 'update' OR $action == 'delete'):
                    $this -> editProduct($action, $id);
                    break;
                default:
                    header('Location: /inventory/list');
                    break;
            }
        }

        private function handlePost($action, $id) {
            switch ($action) {
                case 'add':
                    $this -> addProduct();
                    header('Location: /inventory/add');
                    break;
                case 'update':
                    $this -> updateProduct();
                    header('Location: /inventory/list');
                    break;
                case 'delete':
                    $this -> deleteProduct();
                    header('Location: /inventory/list');
                    break;
                case 'count':
                    $this -> countProduct();
                    header('Location: /inventory/count');
                    // header("Location: /inventory/count/$id");
                    break;
            }
        }

        private function addProduct() {
            $prev = $this -> preview -> upload($_FILES['product_preview']);

            $this -> db -> create('products', [
                'name' => $_POST['product_name'],
                'code' => $_POST['product_code'],
                'amount' => 0,
                'unit' => $_POST['product_unit'],
                'category' => $_POST['product_category'],
                'preview' => $prev,
                'sector' => $_SESSION['user_sector']
            ]);

            return;
        }

        private function updateProduct() {
            $prev = $this -> preview -> replace($_FILES['product_preview'], $_POST['_product']);

            $this -> db -> update('products', [
                'name' => $_POST['product_name'],
                'code' => $_POST['product_code'],
                'unit' => $_POST['product_unit'],
                'category' => $_POST['product_category'],
                'preview' => $prev
            ],[
                'id' => $_POST['_product']
            ]);

            return;
        }

        private function deleteProduct() {
            $this -> preview -> remove($_POST['_product']);
            $this -> db -> delete('products', [
                'id' => $_POST['_product']
            ]);

            return;
        }

        private function countProduct() {
            $this -> db -> update('products', [
                'amount' => $_POST["_product_amount"]
            ], [
                'id' => $_POST['_product_id']
            ]);

            return;
        }
        
        private function editProduct($action, $id) {
            $directory = $this -> directory;
            $result = $this -> db -> read('products', ['id' => $id])[0];
            $categories = $this -> db -> read('categories', ['sector' => $_SESSION['user_sector']]);

            if ($action == 'update') require_once 'views/inventory_update.php';
            if ($action == 'delete') require_once 'views/inventory_delete.php';
        }

        private function searchProduct() {
            $search = $_GET['search'] ?? '';
            $search = trim($search);
            $search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');

            $sector = $_SESSION['user_sector'];

            if (!empty($search)) {
                return $this -> db -> search('products', $sector, $search);
            } else {
                return $this -> db -> read('products', [
                    'sector' => $sector
                ]);
            }
        }

    }
?>