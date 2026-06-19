<?php

require_once '../app/core/DB.php';

class LophocModel
{
    private $conn;

    public function __construct()
    {
        $db = new ConnectDB();
        $this->conn = $db->connect();
    }

    // ======================
    // GET ALL
    // ======================
    public function getAll()
    {
        $sql = "SELECT * FROM lophoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ======================
    // CREATE
    // ======================
    public function create($malop, $tenlop, $ghichu)
    {
        $sql = "INSERT INTO lophoc (malop, tenlop, ghichu)
                VALUES (:malop, :tenlop, :ghichu)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);

        return $stmt->execute();
    }

    // ======================
    // GET BY ID
    // ======================
    public function getById($id)
    {
        $sql = "SELECT * FROM lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ======================
    // UPDATE
    // ======================
    public function update($id, $malop, $tenlop, $ghichu)
    {
        $sql = "UPDATE lophoc 
                SET malop = :malop,
                    tenlop = :tenlop,
                    ghichu = :ghichu
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);

        return $stmt->execute();
    }

    // ======================
    // DELETE
    // ======================
    public function delete($id)
    {
        $sql = "DELETE FROM lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // ======================
    // SEARCH (BẠN ĐANG THIẾU)
    // ======================
   public function search($keyword)
{
    $sql = "SELECT * FROM lophoc 
            WHERE malop LIKE :kw 
            OR tenlop LIKE :kw";

    $stmt = $this->conn->prepare($sql);

    $kw = "%$keyword%";
    $stmt->bindParam(':kw', $kw);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}