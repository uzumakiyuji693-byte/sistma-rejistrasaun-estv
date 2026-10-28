<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $table = 'tb_estudante';
    
    protected $fillable = [
        'no_regis',
        'nrn_estudante',
        'eskola_anterior',
        'fatin_moris',
        'loron_moris',
        'generu',
        'enderesu',
        'no_tlf',
        'email',
        'nrn_pai',
        'nrn_mae',
        'profisaun',
        'departamentu',
        'data_regis',
        'status',
        'dokumen_kartaun',
        'dokumen_sertifikadu',
        'dokumen_nascimentu',
        'dokumen_seluk',
        'dokumen_status',
        'komentariu_admin'
    ];
}