<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('relaxations', function (Blueprint $table) {
            $table->id();

            $table->string('relaxation_no')->unique();

            $table->foreignId('fabric_store_id')
                ->constrained('fabric_stores')
                ->cascadeOnDelete();

            $table->foreignId('fabric_id')
                ->constrained('fabrics')
                ->cascadeOnDelete();

            $table->date('relaxation_date');

            $table->string('lot_batch_no')->nullable();

            $table->decimal('input_quantity', 10, 2);

            $table->string('unit')->default('Kg');

            $table->dateTime('start_time')->nullable();

            $table->dateTime('end_time')->nullable();

            $table->decimal('duration_hours', 8, 2)->nullable();

            $table->string('status')->default('Pending');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relaxations');
    }
};