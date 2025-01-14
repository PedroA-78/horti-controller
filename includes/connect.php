<?php 
    function connectDB() {
        try {
            $pdo = new PDO("sqlite:model/database/matriz.db");
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    }
?>