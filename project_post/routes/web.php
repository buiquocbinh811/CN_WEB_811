<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

// Định nghĩa route cho trang chủ, sẽ gọi phương thức index trong HomeController
Route::get('/', [HomeController::class, "index"]);

// Định nghĩa route cho trang danh sách bài viết, sẽ gọi phương thức index trong PostController
Route::get("posts", [PostController::class, "index"]);
