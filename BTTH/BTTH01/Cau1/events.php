<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['status' => 'error', 'message' => 'Unknown action'];
    
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        $action = $input['action'] ?? '';
    }

    switch($action) {
        case 'add':
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imagePath = '';
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploadDir = 'uploads/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $imagePath = $uploadDir . time() . '_' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            }

            $response = [
                'status' => 'success',
                'flower' => [
                    'id' => time(),
                    'name' => $name,
                    'description' => $description,
                    'image' => $imagePath
                ]
            ];
            break;

        case 'edit':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imagePath = $_POST['current_image'];
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploadDir = 'uploads/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $imagePath = $uploadDir . time() . '_' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
                
                // Xóa ảnh cũ nếu tồn tại
                if (file_exists($_POST['current_image'])) {
                    unlink($_POST['current_image']);
                }
            }

            $response = [
                'status' => 'success',
                'flower' => [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'image' => $imagePath
                ]
            ];
            break;

        case 'delete':
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'];
            // Thực hiện xóa trong database nếu có
            $response = [
                'status' => 'success',
                'message' => 'Xóa hoa thành công'
            ];
            break;
    }

    echo json_encode($response);
}
?>