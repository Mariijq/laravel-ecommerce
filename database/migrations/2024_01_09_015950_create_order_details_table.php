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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('orderDetailsId');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('orderId')->on('orders')->onUpdate('cascade')->onDelete('cascade');            
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('ISBN')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->string('book_name');
            $table->double('price');
            $table->integer('book_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
