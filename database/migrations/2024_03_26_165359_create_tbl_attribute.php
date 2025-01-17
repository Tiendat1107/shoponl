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
        Schema::create('tbl_attribute', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_product');
            $table->unsignedInteger('id_attr');
            $table->string('quantity');
            $table->timestamps();
        
            $table->foreign('id_product')->references('product_id')->on('tbl_products')->onDelete('cascade');
            $table->foreign('id_attr')->references('id_attr')->on('tbl_product_attribute')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_attribute');
    }
};
