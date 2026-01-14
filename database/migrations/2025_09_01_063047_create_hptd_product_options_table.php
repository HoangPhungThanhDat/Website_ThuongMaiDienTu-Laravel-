<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hptd_product_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('color')->nullable(); // màu sắc
            $table->integer('storage_gb')->nullable(); // dung lượng GB
            $table->decimal('price_adjust', 10, 2)->default(0); // giá thay đổi theo option
            $table->integer('quantity')->default(0); // số lượng cho option này
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('product_id')->references('id')->on('hptd_products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hptd_product_options');
    }
};
