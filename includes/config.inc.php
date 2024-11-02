<?php

$host = "sql201.infinityfree.com";
$db_name = "if0_37631960_lalove_web_dashboard";
$username = "if0_37631960";
$password = "kwFhRkPimk2xh";

// $host = "localhost";
// $db_name = "lalove_web_dashboard";
// $username = "root";`
// $password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}