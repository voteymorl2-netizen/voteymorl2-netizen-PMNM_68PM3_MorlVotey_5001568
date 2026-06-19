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

    
public function getAll()
{
    $sql = "SELECT sv.*, lh.tenlop 
            FROM sinhvien sv
            LEFT JOIN lophoc lh ON sv.malop = lh.malop";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    // ======================
    // THÊM SINH VIÊN
    // ======================
    public function create($ten, $gioitinh, $mss, $malop)
    {
        $query = "
            INSERT INTO sinhvien (ten, gioitinh, mss, malop)
            VALUES (:ten, :gioitinh, :mss, :malop)
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mss', $mss);
        $stmt->bindParam(':malop', $malop);

        return $stmt->execute();
    }

    // ======================
    // LẤY THEO ID
    // ======================
    public function getById($id)
    {
        $query = "SELECT * FROM sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ======================
    // UPDATE
    // ======================
    public function update($id, $ten, $gioitinh, $mss, $malop)
    {
        $query = "
            UPDATE sinhvien
            SET ten = :ten,
                gioitinh = :gioitinh,
                mss = :mss,
                malop = :malop
            WHERE id = :id
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mss', $mss);
        $stmt->bindParam(':malop', $malop);

        return $stmt->execute();
    }

    // ======================
    // DELETE
    // ======================
    public function delete($id)
    {
        $query = "DELETE FROM sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // ======================
    // PHÂN TRANG
    // ======================
 public function paging(
    $limit = 5,
    $offset = 0,
    $keyword = '',
    $lop = '',
    $sort = 'mss',
    $order = 'ASC'
)
{
    $sql = "SELECT sv.*, lh.tenlop
            FROM sinhvien sv
            LEFT JOIN lophoc lh ON sv.malop = lh.malop
            WHERE 1=1";

    $params = [];

    // Tìm kiếm
    if (!empty($keyword)) {
        $sql .= " AND (sv.ten LIKE :keyword OR sv.mss LIKE :keyword)";
        $params[':keyword'] = "%{$keyword}%";
    }

    // Lọc theo lớp
    if (!empty($lop)) {
        $sql .= " AND sv.malop = :lop";
        $params[':lop'] = trim($lop);
    }

    // Các cột được phép sắp xếp
    $allowSort = [
        'mss' => 'sv.mss',
        'ten' => 'sv.ten'
    ];

    if (!array_key_exists($sort, $allowSort)) {
        $sort = 'mss';
    }

    $order = strtoupper($order);
    if ($order != 'ASC' && $order != 'DESC') {
        $order = 'ASC';
    }

    $sql .= " ORDER BY " . $allowSort[$sort] . " " . $order;
    $sql .= " LIMIT :limit OFFSET :offset";

    $stmt = $this->conn->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Đếm tổng số bản ghi
    $countSql = "SELECT COUNT(*) FROM sinhvien WHERE 1=1";

    if (!empty($keyword)) {
        $countSql .= " AND (ten LIKE :keyword OR mss LIKE :keyword)";
    }

    if (!empty($lop)) {
        $countSql .= " AND malop = :lop";
    }

    $countStmt = $this->conn->prepare($countSql);

    if (!empty($keyword)) {
        $countStmt->bindValue(':keyword', "%{$keyword}%");
    }

    if (!empty($lop)) {
        $countStmt->bindValue(':lop', trim($lop));
    }

    $countStmt->execute();

    $count = (int)$countStmt->fetchColumn();

    return [
        'data' => $data,
        'totalRecord' => $count,
        'totalPage' => ceil($count / $limit)
    ];
}}