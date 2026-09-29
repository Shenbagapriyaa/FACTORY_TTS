<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->id(); $table->string('fabric_code',50)->unique(); $table->string('fabric_name',150);
            $table->string('fabric_type',100); $table->string('composition')->nullable(); $table->string('color',100)->nullable();
            $table->decimal('gsm',10,2)->nullable(); $table->decimal('width',10,2)->nullable(); $table->string('unit',30)->nullable();
            $table->text('description')->nullable(); $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps(); $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('fabrics'); }
};
