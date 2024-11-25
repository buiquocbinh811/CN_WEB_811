<?php
$flowers = [
    ["id" => 1, "name" => "Hoa Hồng", "description" => "Loài hoa tượng trưng cho tình yêu.", "image" => "images/hoa_sen.webp"],
    ["id" => 2, "name" => "Hoa Cúc", "description" => "Loài hoa biểu tượng cho sự trường thọ.", "image" => "images/hoa_camtucau.webp"],
    ["id" => 3, "name" => "Hoa Sen", "description" => "Biểu tượng của sự thanh khiết.", "image" => "images/hoa_cucdai.webp"],
    ["id" => 4, "name" => "Hoa Súng", "description" => "Biểu tượng của sự trung thuỷ.", "image" => "images/hoa_cuclanho.webp"],
    ["id" => 5, "name" => "Hoa Ban", "description" => "Loài hoa màu sắc rực rỡ.", "image" => "images/hoa_dayenthao.webp"],
    ["id" => 6, "name" => "Hoa Sơn", "description" => "Biểu tượng của sự phú quý.", "image" => "images/hoa_denlong.webp"],
    ["id" => 7, "name" => "Hoa Đồng Tiền", "description" => "Biểu tượng lanh lánh.", "image" => "images/hoa_sen.webp"],
    ["id" => 8, "name" => "Hoa Lan", "description" => "Luôn nửo đẹp vào mùa hè.", "image" => "images/hoa_duacan.webp"],
    ["id" => 9, "name" => "Hoa Cải", "description" => "Loài hoa cảu đất trời.", "image" => "images/hoa_cucdai.webp"],
    ["id" => 10, "name" => "Hoa Giấy", "description" => "Luôn nửo vào chiều thu.", "image" => "images/hoa_cucdai.webp"],
    ["id" => 11, "name" => "Hoa Lồng đèn", "description" => "Biểu tượng của sự thanh tao.", "image" => "images/hoa_giay.webp"],
    ["id" => 12, "name" => "Hoa Húng", "description" => "Thơm mùi lá dứa.", "image" => "images/hoa_thanhtu.webp"],
    ["id" => 13, "name" => "Hoa Phong Ma", "description" => "Đẹp đẽ.", "image" => "images/hoa_pang-xe.webp"],
    ["id" => 14, "name" => "Hoa Cải Mây", "description" => "Ngát hương mà cánh trắng.", "image" => "images/hoa_cucdai.webp"]
];
?>

<div class="text-end mb-3">
    <button class="btn btn-success" onclick="showForm('add')">Thêm hoa</button>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($flowers as $flower): ?>
            <tr data-id="<?= $flower['id'] ?>">
                <td><?= htmlspecialchars($flower['name']) ?></td>
                <td><?= htmlspecialchars($flower['description']) ?></td>
                <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="Image" width="100"></td>
                <td>
                    <button class="btn btn-warning btn-sm" 
                        onclick="showForm('edit', <?= $flower['id'] ?>, 
                        '<?= htmlspecialchars($flower['name']) ?>', 
                        '<?= htmlspecialchars($flower['description']) ?>', 
                        '<?= htmlspecialchars($flower['image']) ?>')">Sửa</button>
                    <button class="btn btn-danger btn-sm" 
                        onclick="deleteFlower(<?= $flower['id'] ?>, this)">Xoá</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="modal-overlay" class="modal-overlay">
    <div class="modal-content">
        <form id="flower-form" enctype="multipart/form-data">
            <input type="hidden" name="action" id="form-type">
            <input type="hidden" name="id" id="form-id">
            <input type="hidden" name="current_image" id="current-image">
            <div class="mb-3">
                <label for="name" class="form-label">Tên hoa</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewUploadedFile(this)" accept="image/*">
                <img id="image-preview" src="" alt="Preview" class="mt-2" style="display:none" width="100">
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-secondary" onclick="hideForm()">Hủy</button>
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
        </form>
    </div>
</div>