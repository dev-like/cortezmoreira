<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpoClinicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corpo_clinico', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome', 250)->nullable();
          $table->string('crf', 250)->nullable();
          $table->string('descricao', 250)->nullable();
          $table->string('imagem', 250)->nullable();

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
        Schema::dropIfExists('corpo_clinico');
    }
}
