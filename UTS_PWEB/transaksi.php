<?php

include 'config/database.php';
include 'class/Transaction.php';

$db = new Database();
$conn = $db->connect();

$transaksi = new Transaction($conn);

if (isset($_POST['submit'])) {

    $id = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    $transaksi->transaksiKeluar($id, $jumlah);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Produk</h2>
     <form method="POST">

        <span>ID Produk:</span>
        <input type="number" name="id_produk">
        <br><br>
        <span>Jumlah:</span>
        <input type="number" name="jumlah">
        <br><br>
        <button type="submit" name="submit">
            Transaksi
        </button>

    </form>
</body>
</html>

