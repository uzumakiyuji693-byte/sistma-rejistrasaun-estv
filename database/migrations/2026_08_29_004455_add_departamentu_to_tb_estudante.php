<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartamentuToTbEstudante extends Migration
{
    public function up()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->string('departamentu', 50)->after('generu');
        });
    }

    public function down()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->dropColumn('departamentu');
        });
    }
}