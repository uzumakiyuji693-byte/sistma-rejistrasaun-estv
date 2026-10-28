<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEskolaAnteriorToTbEstudante extends Migration
{
    public function up()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->string('eskola_anterior', 150)->after('nrn_estudante');
        });
    }

    public function down()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->dropColumn('eskola_anterior');
        });
    }
}