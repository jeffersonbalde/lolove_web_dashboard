<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST['items'];

    try {
        require_once "config.inc.php";

        $query = "DELETE FROM items WHERE item_id = ?";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([$itemID]);

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