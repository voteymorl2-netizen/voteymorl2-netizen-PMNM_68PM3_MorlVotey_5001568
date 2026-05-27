<?php

class Middleware
{
    public function checkLogin()
    {
        $url = $_GET['url'] ?? '';

        // Cho phép vào login
        if ($url == 'auth/login') {
            return;
        }

        // Nếu chưa login
        if (!isset($_SESSION['username'])) {

            header(
                'Location: /PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/auth/login'
            );

            exit;
        }
    }
}

?>