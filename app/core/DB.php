<?php

class ConnectDB
{
    private $host = 'localhost';
    private $db_name = '68pm3';
    private $username = 'root';
    private $password = '';

    private $conn;

    public function connect()
    {
        try {

            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $this->conn;

        } catch(PDOException $e) {

            die("Connection failed: " . $e->getMessage());
        }
    }
}

?>