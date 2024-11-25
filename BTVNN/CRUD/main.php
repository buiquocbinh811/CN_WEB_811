<main>
    <div class="d-flex flex-column align-items-center mb-3">
        <h3>Danh sách sản phẩm</h3>
    </div>
    <div class="container">
        <button class="btn btn-success">Thêm mới</button>

        <table class="table  table-striped">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <p>Không có sản phẩm nào.</p>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?> </td>
                            <td><?= htmlspecialchars($product['price']) ?>VND</td>
                            <td><a href="#" class="text-primary "><i class="bi bi-pencil-square"></i></a></td>
                            <td><a href="#" class="text-danger"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</main>