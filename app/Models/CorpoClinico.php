<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CorpoClinico extends Model
{
    protected $table = 'corpo_clinico';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nome',
    'crf',
    'descricao',
    'imagem'
    ];

    use SoftDeletes;
}
