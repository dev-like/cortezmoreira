<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_site', function (Blueprint $table) {
          $table->increments('id');
          $table->string('resultado_exame', 250)->nullable();
          $table->string('sobre_titulo', 150)->nullable();
          $table->string('sobre_texto', 2500)->nullable();
          $table->string('premios_texto', 350)->nullable();
          $table->string('link_exames', 150)->nullable();
          $table->string('corpoclinico_texto', 500)->nullable();
          $table->string('convenio_texto', 500)->nullable();

          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_site');
    }
}
