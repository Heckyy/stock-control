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
    }
}
