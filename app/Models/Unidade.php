<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Unidade extends Model
{
    protected $table = 'unidades';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'rua',
    'bairro',
    'numero'
    ];

    use SoftDeletes,CascadeSoftDeletes;
}
