<?php

class auth
{
    protected $users = [
        'admin' => '123456',
        'votey' => '654321'
    ];

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            if (
                isset($this->users[$username]) &&
                $this->users[$username] === $password
            ) {

                $_SESSION['username'] = $username;

                header('Location: /PMNM_68PM3_MorlVotey_5001568-main/public/home/index');
                exit();

            } else {

                echo "Login failed";
            }
        }
    }

    public function logout()
    {
        session_destroy();

        header('Location: /PMNM_68PM3_MorlVotey_5001568-main/public/home/login');
        exit();
    }
}

?>