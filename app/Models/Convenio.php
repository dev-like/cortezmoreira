<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convenio extends Model
{
    protected $table = 'convenios';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'descricao'
    ];

    use SoftDeletes;
}
