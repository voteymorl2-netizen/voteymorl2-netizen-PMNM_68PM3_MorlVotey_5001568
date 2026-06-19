<?php

require_once '../app/core/controller.php';

class sinhvien extends Controller
{
    // ==========================
    // DANH SÁCH SINH VIÊN
    // ==========================
    public function index($pageSize = 5, $offset = 0)
    {
        $model = $this->model('SinhvienModel');

        // Tìm kiếm
        $keyword = $_GET['keyword'] ?? '';

        // Lọc lớp
        $lop = trim($_GET['lop'] ?? '');

        // Sắp xếp
        $sort = $_GET['sort'] ?? 'mss';
        $order = $_GET['order'] ?? 'ASC';

        // Lấy dữ liệu
        $result = $model->paging(
            $pageSize,
            $offset,
            $keyword,
            $lop,
            $sort,
            $order
        );

        // Danh sách lớp
        $lopModel = $this->model('LophocModel');
        $lophoc = $lopModel->getAll();

        // Hiển thị View
        $this->view('layout/masterlayout', [
            'viewname'    => 'sinhvien/index',
            'sinhvien'    => $result['data'],
            'totalRecord' => $result['totalRecord'],
            'totalPage'   => $result['totalPage'],
            'pageSize'    => $pageSize,
            'offset'      => $offset,
            'keyword'     => $keyword,
            'lop'         => $lop,
            'sort'        => $sort,
            'order'       => $order,
            'lophoc'      => $lophoc
        ]);
    }

    // ==========================
    // FORM THÊM
    // ==========================
    public function create()
    {
        $lopModel = $this->model('LophocModel');

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/create',
            'lophoc'   => $lopModel->getAll()
        ]);
    }

    // ==========================
    // LƯU SINH VIÊN
    // ==========================
    public function store()
    {
        $model = $this->model('SinhvienModel');

        $result = $model->create(
            $_POST['ten'] ?? '',
            $_POST['gioitinh'] ?? '',
            $_POST['mss'] ?? '',
            $_POST['malop'] ?? ''
        );

        if ($result) {
            header('Location: /sinhvien/index');
            exit;
        }

        echo "Thêm sinh viên thất bại!";
    }

    // ==========================
    // FORM SỬA
    // ==========================
    public function edit($id)
    {
        $model = $this->model('SinhvienModel');
        $lopModel = $this->model('LophocModel');

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/edit',
            'sinhvien' => $model->getById($id),
            'lophoc'   => $lopModel->getAll()
        ]);
    }

    // ==========================
    // CẬP NHẬT
    // ==========================
    public function update($id = null)
    {
        if ($id === null) {
            $id = $_POST['id'] ?? null;
        }

        if (!$id) {
            die("Không tìm thấy ID sinh viên.");
        }

        $model = $this->model('SinhvienModel');

        $model->update(
            $id,
            $_POST['ten'] ?? '',
            $_POST['gioitinh'] ?? '',
            $_POST['mss'] ?? '',
            $_POST['malop'] ?? ''
        );

        header('Location: /sinhvien/index');
        exit;
    }

    // ==========================
    // XÓA
    // ==========================
    public function delete($id)
    {
        $model = $this->model('SinhvienModel');

        $model->delete($id);

        header('Location: /sinhvien/index');
        exit;
    }
}