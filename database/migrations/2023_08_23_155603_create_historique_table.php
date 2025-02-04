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
        Schema::create('historique', function (Blueprint $table) {
            $table->id();
            $table->string('actionHistorique');
            $table->string('statutHistorique');
            $table->string('commentaireAction');
            $table->string('dateAction');
            $table->unsignedBiginteger('idDossier')->unsigned();
            $table->unsignedBiginteger('idUser')->unsigned();

            $table->foreign('idDossier')->references('id')
                 ->on('dossiers')->onDelete('cascade');
                 
            $table->foreign('idUser')->references('id')
                ->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('historique');
    }
};
