<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Premio extends Model
{
    protected $table = 'premios';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'imagem',
    'descricao'
    ];

    use SoftDeletes;
}
