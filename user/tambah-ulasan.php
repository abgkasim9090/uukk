<?php
require_once("../db.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $id_akun = $_SESSION['user']['id'];
    $id_buku = $_GET['id']; // Periksa apakah parameter 'id' telah diberikan dengan benar
    $ulasan = $_POST['deskripsi']; // Pastikan deskripsi telah diberikan melalui metode POST
    $rating = $_POST['rating']; // Pastikan rating telah diberikan melalui metode POST

    // Perbaiki query dengan menghilangkan tanda $ yang tidak perlu pada $id_buku
    $query = mysqli_query($con, "INSERT INTO ulasan (UserID, BukuID, Ulasan, Rating) VALUES ('$id_akun', '$id_buku', '$ulasan', '$rating')");

    if ($query) {
        echo '<script>location.href="detailBuku.php?id=' . $id_buku . '";</script>'; // Perbaiki parameter pada location.href
    } else {
        echo "Gagal menambahkan ulasan: " . mysqli_error($koneksi);
    }
} else {
    header("Location:../404.php");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
}