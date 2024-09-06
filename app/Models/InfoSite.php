<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoSite extends Model
{
    protected $table = 'info_site';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'resultado_exame',
    'sobre_titulo',
    'sobre_texto',
    'premios_texto',
    'link_exames',
    'corpoclinico_texto',
    'convenio_texto'
    ];

    use SoftDeletes;
}
