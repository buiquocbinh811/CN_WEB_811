<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <h2>Quản lý <b>Sản phẩm</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('products.create') }}" class="btn btn-success" style="margin-top: 15px; float: right">
                            <i class="material-icons">&#xE147;</i> <span>Thêm Sản phẩm mới</span>
                        </a>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" 
                                         width="50" 
                                         height="50" 
                                         class="rounded">
                                @endif
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price) }} VNĐ</td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn btn-primary">Sửa</a>
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger" 
                                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>