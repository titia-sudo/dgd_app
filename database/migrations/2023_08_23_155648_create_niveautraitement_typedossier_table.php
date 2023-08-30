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
        Schema::create('niveautraitement_typedossier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('idNiveauTraitement')->unsigned();
            $table->unsignedBiginteger('idTypeDossier')->unsigned();

            $table->foreign('idNiveauTraitement')->references('id')
                 ->on('niveauTraitements')->onDelete('cascade');
            $table->foreign('idTypeDossier')->references('id')
                ->on('typeDossiers')->onDelete('cascade');

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
        Schema::dropIfExists('niveautraitement_typedossier');
    }
};
