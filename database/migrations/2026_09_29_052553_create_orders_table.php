<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Arvind Sales Order Number
            $table->string('so_no')->unique();

            // Shahi Item Number
            $table->string('item_no');

            $table->date('order_date');

            $table->string('customer_name');

            $table->decimal('quantity', 10, 2);

            $table->string('unit')->default('Piece');

            $table->text('size_ratio')->nullable();

            $table->date('delivery_date');

            $table->string('status')->default('Open');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};