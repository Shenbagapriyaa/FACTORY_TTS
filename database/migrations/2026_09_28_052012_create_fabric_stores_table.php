<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fabric_stores', function (Blueprint $table) {

            $table->id();

            $table->string('store_no')->unique();

            $table->foreignId('grn_id')
                ->constrained('grns')
                ->cascadeOnDelete();

            $table->foreignId('fabric_id')
                ->constrained('fabrics')
                ->cascadeOnDelete();

            $table->date('store_date');

            $table->decimal('quantity_received', 10, 2);

            $table->decimal('quantity_available', 10, 2);

            $table->string('unit')->default('Kg');

            $table->string('location')->nullable();

            $table->string('rack_no')->nullable();

            $table->string('status')->default('Available');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fabric_stores');
    }
};