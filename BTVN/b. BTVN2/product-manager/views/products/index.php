<?php require 'views/layouts/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
            Add Product
        </button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td>
                    <img src="<?php echo $product['image']; ?>" class="product-image" alt="Product">
                </td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price']); ?></td>
                <td>
                    <button class="btn btn-sm btn-warning edit-btn" 
                            data-id="<?php echo $product['id']; ?>"
                            data-name="<?php echo htmlspecialchars($product['name']); ?>"
                            data-price="<?php echo $product['price']; ?>"
                            data-image="<?php echo $product['image']; ?>">
                        Edit
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" 
                            data-id="<?php echo $product['id']; ?>">
                        Delete
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 
require 'views/products/form.php';
require 'views/products/delete.php';
require 'views/layouts/footer.php'; 
?>