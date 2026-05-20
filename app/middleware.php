<?php

class Middleware
{
    public function checkLogin()
    {
        $currentUrl = $_SERVER['REQUEST_URI'];

        // Các trang public không cần login
        $publicPages = [
            '/PMNM_68PM3_MorlVotey_5001568-main/public/home/login',
            '/PMNM_68PM3_MorlVotey_5001568-main/public/auth/login'
        ];

        if (
            !isset($_SESSION['username']) &&
            !in_array($currentUrl, $publicPages)
        ) {
            header('Location: /PMNM_68PM3_MorlVotey_5001568-main/public/home/login');
            exit();
        }
    }
}

