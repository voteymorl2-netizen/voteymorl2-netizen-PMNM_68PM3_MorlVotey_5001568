<?php

class App
{
    protected $controller = 'auth';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->UrlProcess();

        // ======================
        // 1. CONTROLLER
        // ======================
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

        // ======================
        // 2. ACTION
        // ======================
        if (!empty($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            } else {
                die("Method not found: " . $url[1]);
            }
        }

        // ======================
        // 3. PARAMS
        // ======================
        $this->params = $url ? array_values($url) : [];

        // ======================
        // 4. CALL CONTROLLER
        // ======================
        call_user_func_array(
            [$this->controller, $this->action],
            $this->params
        );
    }

    // ======================
    // URL PARSER
    // ======================
    public function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode(
                '/',
                filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL)
            );
        }
        return [];
    }
}