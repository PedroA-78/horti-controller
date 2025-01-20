<?php 
    // function connectDB() {
    //     try {
    //         $pdo = new PDO("sqlite:model/database/matriz.db");
    //         $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //     } catch (PDOException $e) {
    //         echo json_encode($e);
    //     }
    // }

    class Database {
        private $pdo;

        public function __construct($db_path) {
            try {
                $this -> pdo = new PDO('sqlite:' . $db_path);
                $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e -> getMessage());
            }
        }

        public function create($table, $data) {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this -> pdo -> prepare($sql);

            return $stmt -> execute($data);
        }

        public function read($table, $conditions, $columns = "*") {
            $sql = "SELECT $columns FROM $table";

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", array_map(fn($condition) => "$condition = :$condition", array_keys($conditions)));
            }

            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> execute($conditions);

            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function update($table, $data, $conditions) {
            $columns = implode(", ", array_map(fn($field) => "$field = :$field", array_keys($data)));
            $placeholder = implode(" AND ", array_map(fn($condition) => "$condition = :$condition", array_keys($conditions))); 

            $sql = "UPDATE $table SET $columns WHERE $placeholder";
            $stmt = $this -> pdo -> prepare($sql);

            return $stmt -> execute(array_merge($data, $conditions));
        }

        public function delete($table, $conditions) {
            $placeholder = implode(" AND ", array_map(fn($condition) => "$condition = :$condition", array_keys($conditions)));

            $sql = "DELETE FROM $table WHERE $placeholder";
            $stmt = $this -> pdo -> prepare($sql);

            return $stmt -> execute($conditions);
        }
    }
?>