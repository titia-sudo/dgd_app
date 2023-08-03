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
        Schema::create('tempsTraitements', function (Blueprint $table) {
            $table->id();
            $table->integer('nombreTempsTraitement');
            $table->unsignedBigInteger('idUniteTempsTraitement');
            $table->timestamps();

            $table->foreign('idUniteTempsTraitement')
            ->references('id')
            ->on('uniteTempsTraitements')
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
        Schema::dropIfExists('tempsTraitements');
    }
};
