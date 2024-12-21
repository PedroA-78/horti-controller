<?php
    include_once 'includes/connect.php';

    function get_method() {

    }

    function _post($table, $data) {
        $pdo = connectDB();

        $fields = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_map(fn($field) => ":$field", array_keys($data)));

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute($data);
    }

    function put_method() {

    }

    function delete_method() {

    }

?>