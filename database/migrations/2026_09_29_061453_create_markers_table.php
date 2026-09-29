<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('markers', function (Blueprint $table) {
            $table->id();

            $table->string('marker_no')->unique();
            $table->string('pattern_no');
            $table->string('so_no');
            $table->string('item_no');

            $table->string('marker_name');

            $table->text('size_ratio')->nullable();

            $table->decimal('marker_length', 10, 2)->nullable();
            $table->decimal('marker_width', 10, 2)->nullable();

            $table->decimal('fabric_consumption', 10, 3)->nullable();

            $table->integer('ply_count')->nullable();

            $table->decimal('efficiency', 5, 2)->nullable();

            $table->date('created_date');

            $table->string('status')->default('Draft');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};