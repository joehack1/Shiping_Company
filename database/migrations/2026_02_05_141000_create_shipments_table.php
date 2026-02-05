<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('mode');
            $table->string('origin_country');
            $table->string('origin_port')->nullable();
            $table->string('destination_country');
            $table->string('destination_port')->nullable();
            $table->string('status')->default('Booked');
            $table->date('estimated_departure')->nullable();
            $table->date('estimated_arrival')->nullable();
            $table->string('incoterm')->nullable();
            $table->decimal('weight_kg', 10, 2)->nullable();
            $table->decimal('volume_cbm', 10, 2)->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
