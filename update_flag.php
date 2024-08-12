<?php
session_start();
require 'database/connect.php'; // Sesuaikan dengan skrip koneksi database Anda

// Pastikan hanya dapat diakses ketika sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Memeriksa apakah ada data yang dikirimkan dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_flag']) && !empty($_POST['selected_flag'])) {
        $selectedFlag = $_POST['selected_flag'];

        // Lakukan sanitasi jika diperlukan
        // Contoh: $selectedFlag = htmlspecialchars($selectedFlag);

        // Lakukan update bendera ke dalam database
        $userId = $_SESSION['user_id']; // Pastikan Anda memiliki data user_id dari session
        $updateStmt = $mysqli->prepare("UPDATE users SET flag = ? WHERE id = ?");
        $updateStmt->bind_param('si', $selectedFlag, $userId);

        if ($updateStmt->execute()) {
            // Jika update berhasil, arahkan kembali ke halaman setting.php atau halaman lain yang sesuai
            header("Location: settings.php");
            exit();
        } else {
            // Jika terjadi kesalahan saat update, Anda dapat menangani di sini
            echo "Error updating flag: " . $mysqli->error;
        }
    } else {
        // Jika data tidak lengkap atau tidak valid, Anda dapat menangani di sini
        echo "Invalid data submitted";
    }
} else {
    // Jika halaman diakses tanpa melalui POST request, Anda dapat menangani di sini
    echo "Invalid request method";
}
?>
