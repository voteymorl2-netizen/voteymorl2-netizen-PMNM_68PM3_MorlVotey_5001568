<?php

class App
{
    protected $controller = 'home';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
<<<<<<< HEAD
        $url = $this->UrlProcess();

        // CONTROLLER
        if (!empty($url[0])) {

            $file = '../app/controllers/' . $url[0] . '.php';

            if (file_exists($file)) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                die("Controller not found: " . $url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        // ACTION
        if (!empty($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            } else {
                die("Method not found: " . $url[1]);
            }
        }

        // PARAMS
        $this->params = $url ? array_values($url) : [];
=======
        $urlProcessed = $this->UrlProcess();

        // Controller
        if (!empty($urlProcessed[0])) {

            if (
                file_exists(
                    '../app/controllers/' .
                    $urlProcessed[0] .
                    '.php'
                )
            ) {

                $this->controller = $urlProcessed[0];

                unset($urlProcessed[0]);
            }
        }

        require_once
            '../app/controllers/' .
            $this->controller .
            '.php';

        $this->controller = new $this->controller;

        // Action
        if (!empty($urlProcessed[1])) {

            if (
                method_exists(
                    $this->controller,
                    $urlProcessed[1]
                )
            ) {

                $this->action = $urlProcessed[1];

                unset($urlProcessed[1]);
            }
        }

        // Params
        $this->params = $urlProcessed
            ? array_values($urlProcessed)
            : [];
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a

        call_user_func_array(
            [$this->controller, $this->action],
            $this->params
        );
    }

    public function UrlProcess()
    {
        if (isset($_GET['url'])) {
<<<<<<< HEAD
            return explode(
                '/',
                filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL)
=======

            return explode(
                '/',
                filter_var(
                    trim($_GET['url'], '/'),
                    FILTER_SANITIZE_URL
                )
>>>>>>> a7440723571c663c63b9dde9b293be2323a2229a
            );
        }

        return [];
    }
}