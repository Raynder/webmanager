<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ElementosComponente extends Migration
{
    public function up()
    {
        Schema::create('elementos_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_componente')->unsigned();
            $table->text('elementos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elementos_componente');
    }
}
