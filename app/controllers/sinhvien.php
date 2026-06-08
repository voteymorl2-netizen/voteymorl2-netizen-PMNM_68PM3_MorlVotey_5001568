<?php
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
    }

    public function create()
    {
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