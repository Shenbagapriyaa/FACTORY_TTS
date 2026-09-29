<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();

            $table->string('inspection_no')->unique();

            $table->foreignId('grn_id')
                ->constrained('grns')
                ->cascadeOnDelete();

            $table->date('inspection_date');

            $table->decimal('received_quantity', 10, 2);

            $table->decimal('inspected_quantity', 10, 2);

            $table->decimal('accepted_quantity', 10, 2)
                ->default(0);

            $table->decimal('rejected_quantity', 10, 2)
                ->default(0);

            $table->string('status')
                ->default('Accepted');

            $table->text('defect_remarks')
                ->nullable();

            $table->text('remarks')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};