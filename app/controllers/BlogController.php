<?php

class BlogController {
    public function index() {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/blog/index.php';
    }

    public function show($id) {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/blog/show.php';
    }

    public function themes() {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/blog/themes.php';
    }
}
