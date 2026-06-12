<?php
<<<<<<< HEAD
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
=======
require_once '../app/core/controller.php';

class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('SinhvienModel');

        $sinhvien = $sinhvienModel->getAllSinhvien();

        $this->view(
            'layout/masterlayout',
            [
                'viewname' => 'sinhvien/index',
                'sinhvien' => $sinhvien
            ]
        );
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
    }

    public function create()
    {
<<<<<<< HEAD
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
=======
        $this->view(
            'layout/masterlayout',
            [
                'viewname' => 'sinhvien/create'
            ]
        );
    }

    public function store()
    {
        $ten = $_POST['ten'] ?? '';
        $gioitinh = $_POST['gioitinh'] ?? '';
        $mss = $_POST['mss'] ?? '';

        $sinhvienModel = $this->model('SinhvienModel');

        $result = $sinhvienModel->create($ten, $gioitinh, $mss);

        if ($result) {

            header(
                'Location: /PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/sinhvien/index'
            );
            exit;

        } else {

            echo "Thêm mới sinh viên thất bại";
        }
    }
} // đóng class
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
