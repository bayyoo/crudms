<?php


$host = 'localhost';
$dbname = 'crud_db'; // Sesuaikan dengan nama database Anda
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>