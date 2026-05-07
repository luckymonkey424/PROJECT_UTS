<?php

include 'config/database.php';
include 'class/Product.php';

$db = new Database();
$conn = $db->connect();

$product = new Product($conn);

$data = $product->tampilProduk();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>Dashboard Inventaris</h2>
    <a href="tambah_produk.php" class="btn">
        Tambah Produk
    </a>
    <a href="transaksi.php" class="btn">
        Transaksi
    </a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>

            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['jenis_produk']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
                <?php
                    if($row['stok'] < 5){
                        echo "Stok menipis";
                    }
                    else{
                        echo "aman";
                    }
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>