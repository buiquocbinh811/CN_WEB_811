<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản phẩm mới</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Thêm Sản phẩm mới</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <x-form-input
                type="text"
                name="product_name"
                label="Tên sản phẩm"
                :value="''"
                required="true" />
            <x-form-input
                type="textarea"
                name="description"
                label="Mô tả"
                :value="''"
                required="true" />
            <x-form-input
                type="number"
                name="price"
                label="Giá"
                :value="0"
                required="true" />
            <x-form-input
                type="text"
                name="category_name"
                label="Danh mục"
                :value="''"
                required="true" />
            <x-form-input
                type="file"
                name="image"
                label="Hình ảnh"
                :value="''" 
                />
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Huỷ</a>
        </form>
    </div>
</body>

</html>