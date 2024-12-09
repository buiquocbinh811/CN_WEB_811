<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicinesController;
// Posts
// Định nghĩa route cho trang chủ, sẽ gọi phương thức index trong HomeController
Route::get('/', [HomeController::class, "index"]);
// Định nghĩa route cho trang danh sách bài viết, sẽ gọi phương thức index trong PostController
Route::get("posts", [PostController::class, "index"]);

//Medicines
Route::get('/medicines', [MedicinesController::class, 'index'])->name('medicines.index');
Route::get('/medicines/create', [MedicinesController::class, 'create'])->name('medicines.create');
Route::post('/medicines', [MedicinesController::class, 'store'])->name('medicines.store');
Route::get('/medicines/{id}', [MedicinesController::class, 'show'])->name('medicines.show');
Route::get('/medicines/{id}/edit', [MedicinesController::class, 'edit'])->name('medicines.edit');
Route::put('/medicines/{id}', [MedicinesController::class, 'update'])->name('medicines.update');
Route::delete('/medicines/{id}', [MedicinesController::class, 'destroy'])->name('medicines.destroy');

// Sales

