<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        $products = $this->model->getAll();
        require_once __DIR__ . '/../views/products/index.php';
    }

    public function store() {
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';
        $image = $this->handleFileUpload();
        
        $this->model->add($name, $price, $image);
        header('Location: index.php');
    }

    public function update() {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';
        $image = isset($_FILES['image']) && $_FILES['image']['error'] === 0 
            ? $this->handleFileUpload() 
            : $_POST['current_image'];

        $this->model->update($id, $name, $price, $image);
        header('Location: index.php');
    }

    public function delete() {
        $id = $_POST['id'] ?? '';
        $this->model->delete($id);
        header('Location: index.php');
    }

    private function handleFileUpload() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $target_dir = "public/uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
            return $image;
        }
        return '';
    }
}