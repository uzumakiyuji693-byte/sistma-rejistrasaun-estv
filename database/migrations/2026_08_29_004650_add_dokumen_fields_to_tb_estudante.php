<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokumenFieldsToTbEstudante extends Migration
{
    public function up()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->string('dokumen_kartaun')->nullable()->after('departamentu');
            $table->string('dokumen_sertifikadu')->nullable();
            $table->string('dokumen_nascimentu')->nullable();
            $table->string('dokumen_seluk')->nullable();
            
            $table->enum('dokumen_status', ['la_verifika', 'verifika', 'inkompletu'])
                  ->default('la_verifika')
                  ->after('dokumen_seluk');
            
            $table->text('komentariu_admin')->nullable()
                  ->after('dokumen_status');
        });
    }

    public function down()
    {
        Schema::table('tb_estudante', function (Blueprint $table) {
            $table->dropColumn([
                'dokumen_kartaun',
                'dokumen_sertifikadu',
                'dokumen_nascimentu',
                'dokumen_seluk',
                'dokumen_status',
                'komentariu_admin'
            ]);
        });
    }
}