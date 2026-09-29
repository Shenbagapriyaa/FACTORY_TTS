<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();

            $table->string('bundle_no')->unique();
            $table->string('qr_code')->unique();

            $table->string('cutting_no');
            $table->string('marker_no');
            $table->string('so_no');
            $table->string('item_no');

            $table->string('size');
            $table->integer('bundle_quantity');

            $table->date('bundle_date');

            $table->string('bundle_operator')->nullable();

            $table->string('status')->default('Created');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};