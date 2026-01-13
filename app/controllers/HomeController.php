<?php

class HomeController {
    public function index() {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/home/index.php';
    }

}