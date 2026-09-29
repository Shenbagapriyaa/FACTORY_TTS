<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->string('shipment_no')->unique();
            $table->string('packing_no');
            $table->string('so_no');
            $table->string('item_no');
            $table->string('customer_name');

            $table->integer('shipment_quantity');

            $table->date('shipment_date');

            $table->string('destination');

            $table->string('transporter')->nullable();

            $table->string('tracking_vehicle_no')->nullable();

            $table->string('status')->default('Ready');

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};