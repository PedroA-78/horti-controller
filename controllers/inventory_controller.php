<?php
    include_once 'includes/connect.php';

    function _get($table, $product) {
        $pdo = connectDB();

        if (isset($product)) {
            $sql = "SELECT * FROM $table WHERE id = :id";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([':id' => $product]);
            
            return $stmt -> fetchAll(PDO::FETCH_ASSOC)[0];
        } else {
            $sql = "SELECT * FROM $table";
            $stmt = $pdo -> query($sql);
    
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

    }

    function _post($table, $data) {
        $pdo = connectDB();

        $fields = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_map(fn($field) => ":$field", array_keys($data)));

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute($data);
    }

    function _put($table, $data) {
        $pdo = connectDB();

        $placeholders = implode(", ", array_map(fn($field) => "$field = :$field", array_keys($data)));

        $sql = "UPDATE $table SET $placeholders WHERE id = :id";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute($data);
    }

    function _delete($table, $product) {
        $pdo = connectDB();

        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([':id' => $product]);
    }

?>