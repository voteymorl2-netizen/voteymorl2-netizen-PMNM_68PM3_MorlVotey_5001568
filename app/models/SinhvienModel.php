<?php

require_once '../app/core/DB.php';

class SinhvienModel
{
    private $conn;

    public function __construct()
    {
        $db = new ConnectDB();

        $this->conn = $db->connect();
    }

    public function getAllSinhvien()
    {
       $query = "SELECT * FROM sinhvien";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>