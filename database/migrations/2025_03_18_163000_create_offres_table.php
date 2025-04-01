<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recru');
            $table->string('entreprise', 50);
            $table->string('contrat', 10);
            $table->text('description');
            $table->date('date_limit');
            $table->timestamps();
            $table->foreign('id_recru')->references('id')->on('users')->onDelete('cascade');
        });
       
    }

    public function down()
    {
        Schema::dropIfExists('offres');
    }
}
