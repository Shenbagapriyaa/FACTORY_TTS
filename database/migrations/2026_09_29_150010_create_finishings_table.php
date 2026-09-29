<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finishings', function (Blueprint $table) {
            $table->id();

            $table->string('finishing_no')->unique();
            $table->string('washing_no');
            $table->string('bundle_no');
            $table->string('so_no');
            $table->string('item_no');
            $table->string('size');

            $table->integer('input_quantity');
            $table->integer('output_quantity')->nullable();
            $table->integer('defect_quantity')->nullable();
            $table->integer('rework_quantity')->nullable();

            $table->boolean('thread_trimming')->default(false);
            $table->boolean('ironing')->default(false);
            $table->boolean('size_measurement')->default(false);
            $table->boolean('visual_inspection')->default(false);

            $table->string('operator_name')->nullable();

            $table->date('finishing_date');

            $table->string('status')->default('In Progress');

            $table->text('defect_details')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finishings');
    }
};