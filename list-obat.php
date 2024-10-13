<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Query untuk mengambil data obat
$sql = "SELECT * FROM obat";
$result = $conn->query($sql);
?>

<h2>Daftar Obat</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <a href="detail-obat.php?id=<?php echo $row['id']; ?>">
                <?php echo $row['nama_obat']; ?>
            </a> - Rp. <?php echo number_format($row['harga'], 2, ',', '.'); ?>
        </li>
    <?php endwhile; ?>
</ul>

<a href="index.php">Kembali ke Home</a> |
<a href="logout.php">Logout</a>
