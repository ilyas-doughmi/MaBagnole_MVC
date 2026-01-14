<?php

class RegisterController {
    public function index() {
        require_once 'app/views/auth/register.php';
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require_once 'app/config/config.php';
            require_once 'app/core/Database.php';
            require_once 'app/models/Client.php';

            $database = new Database();
            $db = $database->connect();
            $client = new Client($db);

            $client->fullname = $_POST['full_name'];
            $client->email = $_POST['email'];
            $client->password = $_POST['password'];

            if($client->register()){
                header('Location: ../login');
            } else {
                header('Location: ../register?error=failed');
            }
        }
    }
}