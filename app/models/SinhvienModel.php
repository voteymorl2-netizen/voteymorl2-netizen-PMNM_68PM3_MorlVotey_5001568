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