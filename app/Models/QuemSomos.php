<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuemSomos extends Model
{
    protected $table = 'quem_somos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'texto',
    'imagem'
    ];

    use SoftDeletes;
}
