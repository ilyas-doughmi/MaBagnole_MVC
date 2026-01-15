<?php

class VehicleController{
    
    public function index() {
        require_once 'app/config/config.php';
        require_once 'app/core/Database.php';
        require_once 'app/models/Vehicle.php';

        $database = new Database();
        $db = $database->connect();
        $vehicleModel = new Vehicle($db);

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $perPage = 6;

        if ($search) {
             $result = $vehicleModel->searchVehicles($search);
             $vehicles = $result['vehicles']; 
             $totalVehicles = $result['count'];
             $totalPages = 1; 
        } else {
            $vehicles = $vehicleModel->getVehiclesPaginated($page, $perPage);
            $totalVehicles = $vehicleModel->getTotalVehicles();
            $totalPages = ceil($totalVehicles / $perPage);
        }

        require_once 'app/views/vehicles/index.php';
    }

    public function details($url_controller, $url_action, $id) {
        require_once 'app/config/config.php';
        require_once 'app/core/Database.php';
        require_once 'app/models/Vehicle.php';
        require_once 'app/models/Review.php';

        $database = new Database();
        $db = $database->connect();
        $vehicleModel = new Vehicle($db);
        $reviewModel = new Review($db);
        
        $vehicle = $vehicleModel->getVehicleById($id);
        $reviews = $reviewModel->getReviewsByVehicleId($id);
        
        require_once 'app/views/vehicles/details.php';
    }

}