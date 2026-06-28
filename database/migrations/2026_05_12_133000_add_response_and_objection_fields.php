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
        Schema::table('information_requests', function (Blueprint $table) {
            $table->text('admin_response')->nullable();
            $table->string('response_file')->nullable();
            
            // Kolom untuk pengajuan keberatan
            $table->text('objection_reason')->nullable();
            $table->string('objection_status')->nullable(); // pending, diproses, selesai
            $table->timestamp('objection_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('information_requests', function (Blueprint $table) {
            $table->dropColumn([
                'admin_response',
                'response_file',
                'objection_reason',
                'objection_status',
                'objection_date'
            ]);
        });
    }
};
