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
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('nomDossier');
            $table->string('declarantDossier');
            $table->string('ifuDossier');
            $table->string('agrementDossier');
            $table->string('destinataireDossier');
            $table->string('elementRequeteDossier');
            $table->string('texteReferenceDossier');
            $table->string('statutDossier')->default('Cree');
            $table->unsignedBiginteger('idUser')->unsigned();
            $table->unsignedBiginteger('idTypeDossier')->unsigned();
            $table->unsignedBiginteger('idAnnee')->unsigned();

            $table->foreign('idUser')->references('id')
                 ->on('users')->onDelete('cascade');

            $table->foreign('idTypeDossier')->references('id')
                ->on('typeDossiers')->onDelete('cascade');

            $table->foreign('idAnnee')->references('id')
                ->on('annees')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
};
