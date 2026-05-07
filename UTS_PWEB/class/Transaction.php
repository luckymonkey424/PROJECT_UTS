<?php

class Transaction {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    //ini adalah method untuk mengurangi jumlah stoknya berdasarkan inputan user
    public function transaksiKeluar($product_id, $jumlah) {

        $cek = mysqli_query($this->conn,
            "SELECT stok FROM products WHERE id='$product_id'"
        );

        $data = mysqli_fetch_assoc($cek);

        $stok = $data['stok'];

        if ($jumlah <= 0) {
            echo "Jumlah transaksi salah";
            return;
        }

        if ($stok < $jumlah) {
            echo "Stok tidak cukup";
            return;
        }

        $sisa = $stok - $jumlah;

        // kalau stok nya dikurangin ama jumlah masih ada sisanya. maka product akan di update
        mysqli_query($this->conn,
            "UPDATE products SET stok='$sisa'
             WHERE id='$product_id'"
        );
        
        mysqli_query($this->conn,
            "INSERT INTO transactions(product_id, jumlah)
             VALUES('$product_id','$jumlah')"
        );

        echo "Transaksi berhasil";
    }
}
?>