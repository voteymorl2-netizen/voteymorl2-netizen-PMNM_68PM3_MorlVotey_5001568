<?php
require_once __DIR__ . '/../core/Controller.php';

class Sinhvien extends Controller
{
    public function index()
    {
        $model = $this->model('SinhvienModel');
        $data = $model->getAllSinhvien();

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/index',
            'sinhvien' => $data
        ]);
    }

    public function create()
    {
        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/create'
        ]);
    }
    public function edit($id)
{
    $sinhvienModel = $this->model('SinhvienModel');

    $sv = $sinhvienModel->getById($id);

    $this->view(
        'layout/masterlayout',
        [
            'viewname' => 'sinhvien/edit',
            'sinhvien' => $sv
        ]
    );
}
public function delete($id)
{
    $sinhvienModel = $this->model('SinhvienModel');

    $sinhvienModel->delete($id);

    header('Location: /sinhvien/index');
    exit;
}

    public function store()
    {
        $model = $this->model('SinhvienModel');

        $result = $model->create(
            $_POST['ten'] ?? '',
            $_POST['gioitinh'] ?? '',
            $_POST['mss'] ?? ''
        );

        if ($result) {
            header('Location: /sinhvien/index');
            exit;
        } else {
            echo "Thêm mới sinh viên thất bại";
        }
    }
}