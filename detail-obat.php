<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

$id = $_GET['id'];

// Query untuk mengambil data obat berdasarkan ID
$sql = "SELECT * FROM obat WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $obat = $result->fetch_assoc();
} else {
    echo "Obat tidak ditemukan!";
    exit();
}
?>

<h2>Detail Obat</h2>
<p>Nama: <?php echo $obat['nama_obat']; ?></p>
<p>Harga: Rp. <?php echo number_format($obat['harga'], 2, ',', '.'); ?></p>
<p>Deskripsi: <?php echo $obat['deskripsi']; ?></p>

<a href="list-obat.php">Kembali ke Daftar Obat</a> |
<a href="logout.php">Logout</a>
