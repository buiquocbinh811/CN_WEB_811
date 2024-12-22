<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;

# Đặt tên theo đúng quy chuẩn khi sử dụng resource (vấn đáp, ưu nhược điểm)
# Không sử dụng khi không cần tạo tất cả các route (chuyên nghiệp hoá)
Route::get('/', [ChannelController::class, 'index'])->name('channels.index');

Route::get('/channels/create', [ChannelController::class, 'create'])->name('channels.create');

Route::post('/channels', [ChannelController::class, 'store'])->name('channels.store');

Route::get('/channels/{id}', [ChannelController::class, 'show'])->name('channels.show');

Route::get('/channels/edit/{id}', [ChannelController::class, 'edit'])->name('channels.edit');

Route::put('/channels/{id}', [ChannelController::class, 'update'])->name('channels.update');

Route::delete('/channels/{id}', [ChannelController::class, 'destroy'])->name('channels.destroy');
