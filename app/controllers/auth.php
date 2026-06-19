<?php

class auth extends Controller
{
    protected $users = [
        'admin' => '123456',
        'votey' => '654321'
    ];

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (
                isset($this->users[$username]) &&
                $this->users[$username] === $password
            ) {

                $_SESSION['username'] = $username;

                // Chuyển sang trang quản lý sinh viên
                header('Location: /sinhvien/index');
                exit();

            } else {

                echo "<script>
                        alert('Sai tài khoản hoặc mật khẩu!');
                        window.location='/auth/login';
                      </script>";
                exit();
            }
        }

        $this->view('home/login');
    }

    public function logout()
    {
        session_destroy();

        header('Location: /auth/login');
        exit();
    }
}