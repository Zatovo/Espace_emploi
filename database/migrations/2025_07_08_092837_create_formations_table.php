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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_C');
            $table->foreign('id_C')->references('id')->on('candidatures')->cascadeOnDelete();
            $table->string('annesco',10);
            $table->string('intitule',50);
            $table->text('description')->nullable();
            $table->string('diplome',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
