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
        Schema::create('channels', function (Blueprint $table) {
            $table->id('ChannelID'); 
            $table->string('ChannelName');
            $table->text('Description')->nullable(); 
            $table->integer('SubscribersCount')->default(0); 
            $table->string('URL'); 
            $table->string('image')->nullable(); // Make sure it ẽists
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
