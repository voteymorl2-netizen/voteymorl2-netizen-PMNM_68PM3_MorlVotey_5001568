<?php

class sinhvien
{
    public function index()
    {  //trả vê views
        require_once '../app/views/sinhvien/index.php';
        
    }

    public function creat()
    {
        require_once '../app/views/sinhvien/create.php';
    }
}