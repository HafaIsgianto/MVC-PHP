<?php
include_once 'C:\xampp\htdocs\Belajar_mvc\config\Database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteDataById('users', $id)) {

        header('Location: /Belajar_mvc/index.php?message=Data%20berhasil%20dihapus.');
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
