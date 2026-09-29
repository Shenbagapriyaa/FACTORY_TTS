<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patterns', function (Blueprint $table) {
            $table->id();

            $table->string('pattern_no')->unique();
            $table->string('so_no');
            $table->string('item_no');
            $table->string('pattern_name');
            $table->string('cad_file_name')->nullable();
            $table->string('size_range')->nullable();
            $table->string('pattern_version')->default('V1.0');
            $table->date('created_date');

            $table->string('status')->default('Draft');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patterns');
    }
};