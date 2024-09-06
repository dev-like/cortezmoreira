<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caminho', 255)->nullable();;
            $table->integer('ordem')->nullable();
            $table->string('video',255)->nullable();
            $table->string('titulo',255)->nullable();
            $table->string('texto', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('textobotao', 30)->nullable();
            $table->string('corbotao', 45)->nullable();
            $table->string('lado', 1)->nullable();

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
        Schema::dropIfExists('banner');
    }
}
