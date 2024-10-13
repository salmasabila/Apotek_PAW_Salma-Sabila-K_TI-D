<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<h2>Selamat datang di Apotek, <?php echo $_SESSION['username']; ?>!</h2>
<a href="list-obat.php">Lihat Daftar Obat</a> |
<a href="logout.php">Logout</a>
