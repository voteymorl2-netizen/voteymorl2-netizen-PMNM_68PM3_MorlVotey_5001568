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

<<<<<<< HEAD
    // =========================
    // LẤY TẤT CẢ SINH VIÊN
    // =========================
    public function getAllSinhvien()
    {
        $query = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($query);
=======
    public function getAllSinhvien()
    {
        $query = "SELECT * FROM sinhvien";

        $stmt = $this->conn->prepare($query);

>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
    // =========================
    // THÊM SINH VIÊN
    // =========================
    public function create($ten, $gioitinh, $mss)
    {
        $query = "
            INSERT INTO sinhvien (ten, gioitinh, mss)
            VALUES (:ten, :gioitinh, :mss)
=======
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
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mss', $mss);

        return $stmt->execute();
    }
<<<<<<< HEAD

    // =========================
    // LẤY THEO ID (EDIT)
    // =========================
    public function getById($id)
    {
        $query = "SELECT * FROM sinhvien WHERE Id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // =========================
    // UPDATE SINH VIÊN
    // =========================
    public function update($id, $ten, $gioitinh, $mss)
    {
        $query = "
            UPDATE sinhvien 
            SET ten = :ten,
                gioitinh = :gioitinh,
                mss = :mss
            WHERE Id = :id
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mss', $mss);

        return $stmt->execute();
    }

    // =========================
    // XÓA SINH VIÊN
    // =========================
    public function delete($id)
    {
        $query = "DELETE FROM sinhvien WHERE Id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // =========================
    // PHÂN TRANG
    // =========================
    public function paging($limit = 5, $offset = 0)
    {
        $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // tổng record
        $countQuery = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
        $countQuery->execute();
        $totalRecord = $countQuery->fetchColumn();

        $totalPage = ceil($totalRecord / $limit);

        return [
            "data" => $data,
            "totalRecord" => $totalRecord,
            "totalPage" => $totalPage,
            "currentPage" => ($offset / $limit) + 1
        ];
    }
}
=======
    public function paging($limit = 5, $offset = 0, $search = "")
{
    // SQL lấy dữ liệu phân trang
    $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Đếm tổng số bản ghi
    $countQuery = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
    $countQuery->execute();
    $totalRecord = $countQuery->fetchColumn();

    // Tính tổng số trang
    $totalPage = ceil($totalRecord / $limit);

    return [
        "data" => $data,
        "totalRecord" => $totalRecord,
        "totalPage" => $totalPage,
        "currentPage" => ($offset / $limit) + 1
    ];
}

}
?>
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
