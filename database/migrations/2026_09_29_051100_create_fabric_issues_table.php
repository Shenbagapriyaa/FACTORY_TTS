<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fabric_issues', function (Blueprint $table) {
            $table->id();

            $table->string('issue_no')->unique();

            $table->foreignId('reservation_id')
                ->constrained('reservations')
                ->cascadeOnDelete();

            $table->foreignId('fabric_store_id')
                ->constrained('fabric_stores')
                ->cascadeOnDelete();

            $table->foreignId('fabric_id')
                ->constrained('fabrics')
                ->cascadeOnDelete();

            $table->date('issue_date');

            $table->string('order_no')->nullable();

            $table->decimal('issue_quantity', 10, 2);

            $table->string('unit')->default('Kg');

            $table->string('issued_to')->nullable();

            $table->string('status')->default('Issued');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fabric_issues');
    }
};