<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quick_requests', function (Blueprint $table) {
            $table->timestamp('client_notified_at')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('quick_requests', function (Blueprint $table) {
            $table->dropColumn('client_notified_at');
        });
    }
};
