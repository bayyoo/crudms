<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    if (!isset($_POST['id']) || !isset($_POST['nama_barang']) || 
        !isset($_POST['harga']) || !isset($_POST['stok']) || 
        !isset($_POST['tanggal'])) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header('Location: ../index.php');
        exit();
    }

    // Ambil data dari form
    $id = $_POST['id'];
    $nama_barang = trim($_POST['nama_barang']);
    $harga = (float)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $tanggal = $_POST['tanggal'];

    // Validasi tambahan
    if (empty($nama_barang) || $harga <= 0 || $stok < 0) {
        $_SESSION['error'] = "Data tidak valid!";
        header("Location: edit.php?id=$id");
        exit();
    }

    try {
        // Update data
        $stmt = $pdo->prepare("UPDATE barang SET 
                              nama_barang = ?, 
                              harga = ?, 
                              stok = ?, 
                              tanggal = ? 
                              WHERE id = ?");
        
        $stmt->execute([$nama_barang, $harga, $stok, $tanggal, $id]);

        // Set pesan sukses
        $_SESSION['success'] = "Data berhasil diupdate!";
        header('Location: ../index.php');
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: edit.php?id=$id");
        exit();
    }
} else {
    // Jika bukan method POST, redirect ke index
    header('Location: ../index.php');
    exit();
}
?>