<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginaComponentesTable extends Migration
{
    public function up()
    {
        Schema::create('pagina_componentes', function (Blueprint $table) {
            $table->id();
            $table->integer('pagina_id');
            $table->integer('componente_id');
            $table->integer('ordem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagina_componentes');
    }
}
