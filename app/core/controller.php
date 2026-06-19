<?php

class  Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($viewName, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $viewName . '.php';
    }

    public function update($id)
{
    $model = $this->model('SinhvienModel');

    $model->update(
        $id,
        $_POST['ten'],
        $_POST['gioitinh'],
        $_POST['mss']
    );

    header('Location: /sinhvien/index');
    exit;
}}