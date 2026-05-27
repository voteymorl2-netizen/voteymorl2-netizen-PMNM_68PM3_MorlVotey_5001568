<?php

class home extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    public function login()
    {
        $this->view('home/login');
    }
}

?>