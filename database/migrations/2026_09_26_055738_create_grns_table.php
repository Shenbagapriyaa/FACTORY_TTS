<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grns', function (Blueprint $table) {
            $table->id();

            $table->string('grn_no')->unique();

            $table->foreignId('material_receiving_id')
                ->constrained('material_receivings')
                ->cascadeOnDelete();

            $table->date('grn_date');

            $table->string('supplier_name');

            $table->decimal('received_quantity', 10, 2);

            $table->string('unit')->default('Kg');

            $table->decimal('accepted_quantity', 10, 2)->default(0);

            $table->decimal('rejected_quantity', 10, 2)->default(0);

            $table->string('status')->default('Accepted');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grns');
    }
};