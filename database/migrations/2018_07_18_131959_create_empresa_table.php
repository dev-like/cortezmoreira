<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomefantasia',150);
            $table->string('telefone',250)->nullable();
            $table->string('whatsapp',250)->nullable();
            $table->string('email',50)->nullable();
            $table->string('endereco',500)->nullable();
            $table->string('missao',850)->nullable();
            $table->string('visao',850)->nullable();
            $table->string('valores',850)->nullable();
            $table->string('instagram',250)->nullable();
            $table->string('facebook',250)->nullable();

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
        Schema::dropIfExists('empresa');
    }
}
