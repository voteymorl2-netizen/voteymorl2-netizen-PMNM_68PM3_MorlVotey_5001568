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

    public function create($ten, $gioitinh, $mss)
    {
        $query = "
            INSERT INTO sinhvien
            (
                ten,
                gioitinh,
                mss
            )
            VALUES
            (
                :ten,
                :gioitinh,
                :mss
            )
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mss', $mss);

        return $stmt->execute();
    }
}
?>