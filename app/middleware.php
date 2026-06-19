<?php

class Middleware
{
    public function checkLogin()
    {
        // Lấy URL hiện tại
        $url = $_GET['url'] ?? '';

        // Cho phép truy cập trang đăng nhập
        if ($url == '' || strpos($url, 'auth/login') === 0) {
            return;
        }

        // Nếu chưa đăng nhập
        if (!isset($_SESSION['username'])) {

            header("Location: /auth/login");
            exit();
        }
    }
}