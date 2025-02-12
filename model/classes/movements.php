<?php 
    include_once 'model/classes/connect.php';

    class Movement {
        private $db;

        public function __construct($databasePath) {
            $this -> db = new Database($databasePath);
        }

        public function handleRequest($action = '') {
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method == "GET") $this -> handleGet();
            if ($method == "POST") $this ->  handlePost($action);
        }

        private function handleGet() {
            $movements = $this -> getMovements(['sector' => $_SESSION['user_sector']]);
            $sector = $this -> db -> read('sectors', ['id' => $_SESSION['user_sector']])[0]['name'];

            require_once 'views/dashboard_movements.php';

        }

        private function handlePost($action) {
            switch ($action) {
                case ($action == 'add' OR $action == 'update' OR $action == 'delete'):
                    echo json_encode($_POST);
                    $this -> db -> create('movements', [
                        'product' => strtolower($_POST['product_name']),
                        'amount' => 0,
                        'unit' => $_POST['product_unit'],
                        'user' => $_SESSION['user_id'],
                        'date_time' => $this -> setDate(),
                        'type' => $this -> setType($action),
                        'sector' => $_SESSION['user_sector']
                    ]);
                    break;
                case 'count':
                    $movements = json_decode($_POST['_product_movements'], true);
                    foreach ($movements as $movement) {
                        $this -> db -> create('movements', [
                            'product' => $this -> db -> read('products', ['id' => $_POST['_product_id']], 'name')[0]['name'],
                            'amount' => $movement['amount'],
                            'unit' => $_POST['_product_unit'],
                            'user' => $_SESSION['user_id'],
                            'date_time' => $movement['datetime'],
                            'type' => $movement['type'],
                            'sector' => $_SESSION['user_sector']
                        ]);
                    }
                    break;
                case 'newcount':
                    $this -> startNewCount();
                    break;
            }

        }

        public function getMovements($conditions) {
            $movements = $this -> db -> read('movements', $conditions);

            for ($i = 0; $i < count($movements); $i++) {
                $user = $this -> db -> read('users', ['id' => $movements[$i]['user']])[0];
                $movements[$i]['user'] = $user['email'];
                $movements[$i]['type'] = $this -> setIconType($movements[$i]['type']);
            }

            return $movements;
        }

        private function setType($action) {
            switch ($action) {
                case 'add':
                    return 'Registro';
                    break;
                case 'update':
                    return 'Atualização';
                    break;
                case 'delete':
                    return 'Exclusão';
                    break;
            }
        }

        private function setDate() {
            $date = new DateTimeImmutable("now", new DateTimeZone('America/Sao_Paulo'));
            $time = $date -> format('Y/m/d H:i:s');

            return $time;
        }

        private function setIconType($type) {
            switch ($type) {
                case 'Entrada':
                    return 'arrow_upward';
                    break;
                case 'Saida':
                    return 'arrow_downward';
                    break;
                case 'Registro':
                    return 'add';
                    break;
                case 'Atualização':
                    return 'edit';
                    break;
                case 'Exclusão':
                    return 'delete';
                    break;
            }
        }

        private function startNewCount() {
            $this -> db -> deleteAllRegisters('movements');
        }
    }
?>