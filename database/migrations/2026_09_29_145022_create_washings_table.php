<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('washings', function (Blueprint $table) {
            $table->id();

            $table->string('washing_no')->unique();
            $table->string('sewing_no');
            $table->string('bundle_no');
            $table->string('so_no');
            $table->string('item_no');
            $table->string('size');

            $table->string('process_type'); // Semi Wash, Final Wash, Direct Wash, Laser

            $table->integer('input_quantity');
            $table->integer('output_quantity')->nullable();
            $table->integer('rejected_quantity')->nullable();

            $table->string('washing_machine')->nullable();
            $table->string('operator_name')->nullable();

            $table->date('process_date');

            $table->string('status')->default('In Progress');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('washings');
    }
};