<?php
require_once 'config/database.php';
require_once 'controllers/ProductController.php';

$controller = new ProductController();
$action = $_POST['action'] ?? 'index';

switch ($action) {
    case 'add':
        $controller->store();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
}