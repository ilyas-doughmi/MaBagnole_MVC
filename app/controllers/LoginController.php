<?php

class LoginController {
    public function index() {
        require_once 'app/views/auth/login.php';
    }

    public function authenticate() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require_once 'app/config/config.php';
            require_once 'app/core/Database.php';
            require_once 'app/models/User.php';

            $database = new Database();
            $db = $database->connect();
            $user = new user($db);

            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            if($user->login()){
                header('Location: ../home');
            } else {
                header('Location: ../login?error=invalid');
            }
        }
    }
}