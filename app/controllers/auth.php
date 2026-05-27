<?php

class auth extends Controller
{
    protected $users = [
        'admin' => '123456',
        'votey' => '654321'
    ];

    public function login()
    {
        // Submit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            if (
                isset($this->users[$username]) &&
                $this->users[$username] === $password
            ) {

                $_SESSION['username'] = $username;

                header(
                    'Location: /PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/home/index'
                );

                exit();

            } else {

                echo "Login failed";
            }
        }

        // Load view
        $this->view('home/login');
    }

    public function logout()
    {
        session_destroy();

        header(
            'Location: /PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/auth/login'
        );

        exit();
    }
}