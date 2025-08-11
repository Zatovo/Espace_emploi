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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recru');
            $table->foreign('id_recru')->references('id')->on('users')->cascadeOnDelete();
            $table->string('title_poste',50);
            $table->string('entreprise',50);
            $table->string('photo',100);
            $table->text('description');
            $table->string('localisation',50);
            $table->string('contrat',10);
            $table->unsignedInteger('exp');
            $table->unsignedInteger('sale_limit_bas');
            $table->unsignedInteger('sale_limit_haut');
            $table->date('date_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
