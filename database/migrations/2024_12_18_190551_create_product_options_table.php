<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id(); // Unique ID
            $table->unsignedBigInteger('product_id'); // Foreign key to products
            $table->integer('memory'); // Memory in MB
            $table->integer('cpu_limit'); // CPU limit in percentage
            $table->integer('allocation_limit'); // Allocation limit
            $table->integer('database_limit'); // Database limit
            $table->integer('backup_limit'); // Backup limit
            $table->integer('storage'); // Storage in MB
            $table->unsignedBigInteger('egg_id'); // Reference to eggs
            $table->integer('price'); // Price in pence
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_options');
    }
}
