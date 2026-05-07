<?php

class Product {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    //ini adalah method untuk menambahkan produknya
    public function tambahProduk($nama, $jenis, $stok) {

        if ($stok < 0) {
            echo "Stok tidak boleh negatif!";
            return;
        }

        $query = "INSERT INTO products(nama_produk, jenis_produk, stok)
                  VALUES('$nama','$jenis','$stok')";

        mysqli_query($this->conn, $query);

        echo "Produk berhasil ditambahkan";
    }
        //ini adalah method untuk menampilkan produknya
    public function tampilProduk() {

        $query = "SELECT * FROM products";
        return mysqli_query($this->conn, $query);
    }
}
?>