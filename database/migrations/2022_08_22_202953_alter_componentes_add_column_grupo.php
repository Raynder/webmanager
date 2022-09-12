<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterComponentesAddColumnGrupo extends Migration
{
    public function up()
    {
        Schema::table('pagina_componentes', function (Blueprint $table) {
            $table->integer('grupo')->default(2);
        });
    }

    public function down()
    {
        Schema::table('pagina_componentes', function (Blueprint $table) {
            $table->dropColumn('grupo');
        });
    }
}
