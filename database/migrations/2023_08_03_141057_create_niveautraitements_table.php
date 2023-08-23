<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('niveauTraitements', function (Blueprint $table) {
            $table->id();
            $table->string('nomNiveau');
            $table->unsignedBigInteger('idTempsTraitement');
            $table->timestamps();

            $table->foreign('idTempsTraitement')
            ->references('id')
            ->on('tempsTraitements')
            ->onDelete('cascade');

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveauTraitements');
    }
};
