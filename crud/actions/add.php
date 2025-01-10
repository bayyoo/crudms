<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    if (!isset($_POST['nama_barang']) || !isset($_POST['harga']) || 
        !isset($_POST['stok']) || !isset($_POST['tanggal'])) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header('Location: ../index.php');
        exit();
    }

    // Ambil data dari form
    $nama_barang = trim($_POST['nama_barang']);
    $harga = (float)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $tanggal = $_POST['tanggal'];

    // Validasi data
    if (empty($nama_barang) || $harga <= 0 || $stok < 0) {
        $_SESSION['error'] = "Data tidak valid!";
        header('Location: ../index.php');
        exit();
    }

    try {
        // Insert data
        $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, harga, stok, tanggal) 
                              VALUES (?, ?, ?, ?)");
        
        $stmt->execute([$nama_barang, $harga, $stok, $tanggal]);

        $_SESSION['success'] = "Data berhasil ditambahkan!";
        header('Location: ../index.php');
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header('Location: ../index.php');
        exit();
    }
} else {
    // Jika bukan method POST, redirect ke index
    header('Location: ../index.php');
    exit();
}
?>