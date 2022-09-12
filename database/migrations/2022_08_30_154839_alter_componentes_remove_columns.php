<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterComponentesRemoveColumns extends Migration
{
    public function up()
    {
        Schema::table('componentes', function (Blueprint $table) {
            $table->dropColumn('texto');
            $table->dropColumn('img');
        });
    }

    public function down()
    {
        Schema::table('componentes', function (Blueprint $table) {
            $table->text('texto')->nullable();
            $table->string('img')->nullable();
        });
    }
}
