<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();

            $table->string('reservation_no')->unique();

            $table->foreignId('fabric_store_id')
                ->constrained('fabric_stores')
                ->cascadeOnDelete();

            $table->foreignId('fabric_id')
                ->constrained('fabrics')
                ->cascadeOnDelete();

            $table->date('reservation_date');

            $table->string('order_no')->nullable();

            $table->decimal('reserved_quantity', 10, 2);

            $table->string('unit')->default('Kg');

            $table->string('purpose')->nullable();

            $table->string('status')
                ->default('Reserved');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};