<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $item = $_POST["item"];
    $qty = $_POST["qty"];

    try {
        require_once "config.inc.php";

        $query = "INSERT INTO items (item_name, item_qty) VALUES (?,?);";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([$item, $qty]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}