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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id_session',30)->primary();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->ipAddress();
            $table->string('user_agent');
            $table->timestamp('last_activity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
