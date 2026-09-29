<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sewings', function (Blueprint $table) {
            $table->id();

            $table->string('sewing_no')->unique();

            $table->string('bundle_no');

            $table->string('cutting_no');

            $table->string('so_no');

            $table->string('item_no');

            $table->string('size');

            $table->integer('bundle_quantity');

            $table->integer('input_quantity')->nullable();

            $table->integer('output_quantity')->nullable();

            $table->integer('rejected_quantity')->nullable();

            $table->string('line_no')->nullable();

            $table->string('operator_name')->nullable();

            $table->string('production_stage')->default('Inline');

            $table->date('sewing_date');

            $table->string('status')->default('In Progress');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sewings');
    }
};