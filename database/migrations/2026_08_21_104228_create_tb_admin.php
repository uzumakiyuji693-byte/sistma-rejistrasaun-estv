<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAdmin extends Migration
{
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('naran_kompletu', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_admin');
    }
}

