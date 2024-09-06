<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nomefantasia',
    'instagram',
    'telefone',
    'whatsapp',
    'missao',
    'visao',
    'valores',
    'facebook',
    'endereco',
    'linkedin',
    'youtube',
    'email'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}
