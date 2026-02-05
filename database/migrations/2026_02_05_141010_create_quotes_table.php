<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('service_type');
            $table->string('origin_country')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('cargo_description')->nullable();
            $table->decimal('weight_kg', 10, 2)->nullable();
            $table->decimal('volume_cbm', 10, 2)->nullable();
            $table->date('ready_date')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
