<?php 
    include_once "model/classes/connect.php";
    include_once "model/classes/movements.php";

    class Backup {
        private $db;
        private $movements;
        private $directory = "model/backups/";
        private $formatter;

        public function __construct($databasePath) {
            $this -> db = new Database($databasePath);
            $this -> movements = new Movement($databasePath);
            $this -> formatter = $formatter = new IntlDateFormatter (
                'pt_BR',
                IntlDateFormatter::FULL,
                IntlDateFormatter::NONE,
                'America/Sao_Paulo',          
                IntlDateFormatter::GREGORIAN
            );
        }

        public function handleRequest($action = null) {
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method == 'GET') $this -> handleGet();
            if ($method == 'POST') $this -> handlePost($action);
        }

        private function handleGet() {
            $sector = $this -> db -> read('sectors', ['id' => $_SESSION['user_sector']])[0]['name'];
            $backups = [];

            foreach ($this -> backupList() as $backup) {
                $json = json_decode(file_get_contents($this -> getDirectory() . $backup), true);
                $date = $this -> setDate(null, $json['date']);

                array_push($backups, [
                    'id' => $json['id'],
                    'file' => $backup,
                    'date' => $this -> formatter -> format($date) . ' às ' . $date -> format('H:i'),
                    'items' => count($json['count'])
                ]);
            }

            require_once 'views/dashboard_backups.php';
        }

        private function handlePost($action) {
            switch ($action) {
                case 'newcount':
                    $this -> newBackup();
                    break;
                case 'restore':
                    $this -> restoreBackup();
                    header('Location: /inventory/count');
                    break;
                case 'export':
                    // $this -> exportBackup();
                    break;
            }
        }

        private function newBackup() {
            $user_sector = $_SESSION['user_sector'];

            $count = $this -> db -> customRead(
                'SELECT id, name, amount FROM products WHERE sector = :sector AND amount != 0', 
                [':sector' => $user_sector]
            );
            $movements = $this -> movements -> getMovements(['sector' => $user_sector], false);

            $backup = [
                'id' => uniqid("backup_", false),
                'date' => $this -> setDate('Y/m/d H:i:s'),
                'count' => $count,
                'movements' => $movements
            ];

            $json = json_encode($backup, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            if (!is_dir($this -> getDirectory())) {
                mkdir($this -> getDirectory(), 0775, true);
            }

            file_put_contents($this -> getDirectory() . $backup['id'] . '.json', $json);

            return;
        }

        private function restoreBackup() {
            $backupFile = file_get_contents($this -> getDirectory() . $_POST['backup'] . '.json');
            $backupData = json_decode($backupFile, true);

            if (!empty($backupData['count'])) {
                $this -> db -> update('products', ['amount' => 0], ['sector' => $_SESSION['user_sector']]);

                foreach ($backupData['count'] as $count) {
                    $this -> db -> update('products', ['amount' => $count['amount']], ['id' => $count['id']]);
                }
            }

            if (!empty($backupData['movements'])) {
                $this -> db -> deleteAllRegisters('movements');

                foreach ($backupData['movements'] as $movement) {
                    $this -> db -> create('movements', [
                        'product' => $movement['product'],
                        'amount' => $movement['amount'],
                        'unit' => $movement['unit'],
                        'user' => $movement['user'],
                        'date_time' => $movement['date_time'],
                        'type' => $movement['type'],
                        'sector' => $movement['sector']
                    ]);
                }
            }
        }


        private function setDate($format = null, $date = 'now') {
            $date = new DateTimeImmutable($date, new DateTimeZone('America/Sao_Paulo'));

            if ($format) {
                $date = $date -> format($format);
            }

            return $date;
        }

        private function backupList() {
            $files = scandir($this -> getDirectory());
            
            if (!empty($files)) {
                $backups = [];

                foreach ($files as $file) {
                    if ($file !== '.' AND $file !== '..') {
                        array_push($backups, $file);
                    }
                }

                return array_reverse($backups);
            }

            return;
        }

        private function getDirectory() {
            $sector = $this -> db -> read('sectors', ['id' => $_SESSION['user_sector']])[0]['name'];
            return $this -> directory . strtolower($sector) . '/';
        }
    }
?>