<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_receivings', function (Blueprint $table) {
            $table->id();

            $table->string('receiving_no')->unique();

            $table->string('supplier_name');

            $table->foreignId('fabric_id')
                ->constrained('fabrics')
                ->cascadeOnDelete();

            $table->date('received_date');

            $table->string('lot_batch_no');

            $table->decimal('received_quantity', 10, 2);

            $table->string('unit')->default('Kg');

            $table->text('remarks')->nullable();

            $table->string('status')->default('Received');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_receivings');
    }
};