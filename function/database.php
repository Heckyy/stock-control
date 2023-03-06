<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $db_name = 'stock';
    private $db_password = '';
    public $conn = "";
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->db_password, $this->db_name);
        //     if ($this->conn) {
        //         echo "koneksi berhasil";
        //         // $hasil = "Koneksi Berhasil";
        //         // return $hasil;
        //     }
    }

    public function insert($query)
    {
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return "Anda Berhasil Memasukan Data";
        } else {
            return "Data Gagal Di Masukan!";
        }
    }
    public function update($query)
    {
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return "Anda Berhasil Update Data!";
        } else {
            return "Update Data Gagal !";
        }
    }
    public function selectAll($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}
