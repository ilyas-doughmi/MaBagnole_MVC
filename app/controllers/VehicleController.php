<?php

class VehicleController{
    
    public function index()
    {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/vehicles/index.php';
    }

    public function details()
    {
        require_once 'app/views/layouts/header.php';
        require_once 'app/views/vehicles/details.php';
    }
}