<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('where_to');
            $table->json('service_ids')->nullable();
            $table->string('status')->default('received');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_requests');
    }
};
