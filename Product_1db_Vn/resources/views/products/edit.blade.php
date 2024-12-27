<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản phẩm</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Sửa Sản phẩm</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-input 
                type="text" 
                name="product_name" 
                label="Tên sản phẩm" 
                :value="$product->product_name" 
                required="true" 
            />
            <x-form-input 
                type="textarea" 
                name="description" 
                label="Mô tả" 
                :value="$product->description" 
            />
            <x-form-input 
                type="number" 
                name="price" 
                label="Giá" 
                :value="$product->price" 
                required="true" 
            />
            <x-form-input 
                type="text" 
                name="category_name" 
                label="Danh mục" 
                :value="$product->category_name" 
                required="true" 
            />
            <x-form-input 
                type="file" 
                name="image" 
                label="Hình ảnh" 
                :value="$product->image" 
            />
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>