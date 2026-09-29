<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cuttings', function (Blueprint $table) {
            $table->id();

            $table->string('cutting_no')->unique();

            $table->string('marker_no');
            $table->string('pattern_no');
            $table->string('so_no');
            $table->string('item_no');

            $table->date('cutting_date');

            $table->string('fabric_issue_no');

            $table->decimal('lay_quantity', 10, 2)->nullable();
            $table->integer('ply_count')->nullable();

            $table->decimal('planned_cut_qty', 10, 2)->nullable();
            $table->decimal('actual_cut_qty', 10, 2)->nullable();
            $table->decimal('rejected_qty', 10, 2)->nullable();

            $table->string('cutter_operator')->nullable();

            $table->string('status')->default('Draft');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuttings');
    }
};