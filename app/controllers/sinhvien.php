<?php

class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('SinhvienModel');

        $sinhvien = $sinhvienModel->getAllSinhvien();

        $this->view(
            "sinhvien/index",
            ['sinhvien' => $sinhvien]
        );
    }

    public function create()
    {
        $this->view('sinhvien/create');
    }
}

?>