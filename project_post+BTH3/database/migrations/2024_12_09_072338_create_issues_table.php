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
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->foreignId('computer_id')->constrained()->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng computers
            $table->string('reported_by', 50); // Người báo cáo sự cố
            $table->dateTime('reported_date'); // Thời gian báo cáo sự cố
            $table->text('description'); // Mô tả sự cố
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ khẩn cấp
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái sự cố
            $table->timestamps(); // Cột created_at và updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
