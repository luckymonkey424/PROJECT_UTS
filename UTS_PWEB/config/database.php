<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "inventory_toko";

    public $conn;

    public function connect() {

        $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

        if (!$this->conn) {
            die("Koneksi gagal");
        }

        return $this->conn;
    }
}
?>