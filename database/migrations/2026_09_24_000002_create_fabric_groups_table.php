<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fabric_groups', function (Blueprint $table) {
            $table->id(); $table->string('group_code',50)->unique(); $table->string('group_name',150);
            $table->text('description')->nullable(); $table->enum('status',['Active','Inactive'])->default('Active'); $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('fabric_groups'); }
};
