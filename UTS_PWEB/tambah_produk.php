<?php

include 'config/database.php';
include 'class/Product.php';

$db = new Database();
$conn = $db->connect();

$product = new Product($conn);

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];

    $product->tambahProduk($nama, $jenis, $stok);
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

    <span>Nama Produk:</span>
    <input type="text" name="nama">
    <span>Jenis:</span>
    <select name="jenis">
        <option>Laptop</option>
        <option>Smartphone</option>
    </select>
    <span>Jumlah:</span>
    <input type="number" name="stok">
    <button type="submit" name="submit">
        Tambah Produk
    </button>

</form>

</body>
</html>