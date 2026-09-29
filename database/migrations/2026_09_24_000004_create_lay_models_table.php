<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lay_models', function (Blueprint $table) {
            $table->id(); $table->string('lay_model_code',50)->unique(); $table->string('lay_model_name',150);
            $table->foreignId('fabric_group_id')->constrained('fabric_groups')->restrictOnDelete();
            $table->foreignId('fabric_id')->constrained('fabrics')->restrictOnDelete();
            $table->decimal('lay_length',10,2); $table->decimal('lay_width',10,2); $table->unsignedInteger('number_of_plies');
            $table->string('garment_size',50)->nullable(); $table->decimal('marker_length',10,2)->nullable(); $table->decimal('marker_width',10,2)->nullable();
            $table->text('description')->nullable(); $table->enum('status',['Active','Inactive'])->default('Active'); $table->timestamps();
            $table->index(['fabric_group_id','fabric_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('lay_models'); }
};
