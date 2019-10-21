<?php
include 'config/routes.php';
include 'controllers/FrontController.php';
session_start();

$controller = new FrontController();
$controller->route($route, $id_worker, $order, $sort, $salary);