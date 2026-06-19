<?php

require_once '../app/core/Controller.php';

class Lophoc extends Controller
{
    // =====================
    // INDEX + SEARCH
    // =====================
    public function index()
    {
        $model = $this->model('LophocModel');

        $keyword = $_GET['keyword'] ?? '';

        if ($keyword != '') {
            $lophoc = $model->search($keyword);
        } else {
            $lophoc = $model->getAll();
        }

        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/index',
            'lophoc'   => $lophoc,
            'keyword'  => $keyword
        ]);
    }

    // =====================
    // CREATE FORM
    // =====================
    public function create()
    {
        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/create'
        ]);
    }

    // =====================
    // STORE
    // =====================
    public function store()
    {
        $model = $this->model('LophocModel');

        $malop  = $_POST['malop'] ?? '';
        $tenlop = $_POST['tenlop'] ?? '';
        $ghichu = $_POST['ghichu'] ?? '';

        $result = $model->create($malop, $tenlop, $ghichu);

        if ($result) {
            header('Location: /lophoc/index');
            exit;
        }

        echo "Thêm lớp học thất bại";
    }

    // =====================
    // EDIT
    // =====================
    public function edit($id)
    {
        $model = $this->model('LophocModel');

        $lop = $model->getById($id);

        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/edit',
            'lophoc'   => $lop
        ]);
    }

    // =====================
    // UPDATE (BẠN THIẾU HÀM NÀY)
    // =====================
    public function update($id)
    {
        $model = $this->model('LophocModel');

        $malop  = $_POST['malop'] ?? '';
        $tenlop = $_POST['tenlop'] ?? '';
        $ghichu = $_POST['ghichu'] ?? '';

        $model->update($id, $malop, $tenlop, $ghichu);

        header('Location: /lophoc/index');
        exit;
    }

    // =====================
    // DELETE
    // =====================
    public function delete($id)
    {
        $model = $this->model('LophocModel');

        $model->delete($id);

        header('Location: /lophoc/index');
        exit;
    }
}