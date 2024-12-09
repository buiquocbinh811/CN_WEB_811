<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Mã giao dịch bán hàng (khóa chính)
            $table->unsignedBigInteger('medicine_id'); // Khóa ngoại tham chiếu tới bảng medicines
            $table->integer('quantity'); // Số lượng thuốc bán ra
            $table->dateTime('sale_date'); // Ngày giờ bán hàng
            $table->string('customer_phone', 10)->nullable(); // Số điện thoại người mua (tùy chọn)
            $table->timestamps(); // Thêm created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
