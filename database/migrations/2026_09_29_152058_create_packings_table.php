<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packings', function (Blueprint $table) {
            $table->id();

            $table->string('packing_no')->unique();

            $table->string('finishing_no');
            $table->string('bundle_no');

            $table->string('so_no');
            $table->string('item_no');
            $table->string('size');

            $table->integer('input_quantity');
            $table->integer('packed_quantity')->nullable();
            $table->integer('rejected_quantity')->nullable();

            $table->string('packing_type')->default('Standard');

            $table->string('operator_name')->nullable();

            $table->date('packing_date');

            $table->string('status')->default('In Progress');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packings');
    }
};