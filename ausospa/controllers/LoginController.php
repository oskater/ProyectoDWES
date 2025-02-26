<?php
require_once __DIR__ . '/../views/LoginController.php';

class LoginController
{
    private $LoginView;

    public function __construct()
    {
        $this->LoginView = new LoginView();
    }
}
