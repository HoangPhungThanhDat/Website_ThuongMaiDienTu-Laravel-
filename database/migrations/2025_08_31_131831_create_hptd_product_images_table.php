<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hptd_product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('image_path');
            $table->boolean('is_main')->default(0);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('hptd_product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
