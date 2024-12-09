<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('computer_name', 50); // Tên máy tính
            $table->string('model', 100); // Tên phiên bản máy tính
            $table->string('operating_system', 50); // Hệ điều hành
            $table->string('processor', 100); // Bộ vi xử lý
            $table->integer('memory'); // Bộ nhớ RAM (GB)
            $table->boolean('available'); // Trạng thái hoạt động của máy tính
            $table->timestamps(); // Cột created_at và updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
