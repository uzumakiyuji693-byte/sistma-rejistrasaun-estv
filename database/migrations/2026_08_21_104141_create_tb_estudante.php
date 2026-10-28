<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEstudante extends Migration
{
    public function up()
    {
        Schema::create('tb_estudante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_regis', 20)->unique();
            $table->string('nrn_estudante', 100);
            $table->string('fatin_moris', 50);
            $table->date('loron_moris');
            $table->enum('generu', array('Mane','Feto'));
            $table->text('enderesu');
            $table->string('no_tlf', 20);
            $table->string('email', 100)->nullable();
            $table->string('nrn_pai', 100);
            $table->string('nrn_mae', 100);
            $table->string('profisaun', 50)->nullable();
            $table->date('data_regis');
            $table->enum('status', array('prosesa', 'Simu', 'La simu'))->default('prosesa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_estudante');
    }
}