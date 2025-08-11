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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cand');
            $table->foreign('id_cand')->references('id')->on('users')->cascadeOnDelete();
            $table->string('cv')->default('N/A');
            $table->text('description')->nullable();
            $table->string('adresse',50);
            $table->string('niveau',20);
            $table->text('exp');
            $table->date('date_naiss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
