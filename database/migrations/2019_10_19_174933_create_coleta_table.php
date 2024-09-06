<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coleta', function (Blueprint $table) {
          $table->increments('id');
            $table->string('title');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('celular',20)->nullable();
            $table->string('endereco',550)->nullable();

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
        Schema::dropIfExists('coleta');
    }
}
