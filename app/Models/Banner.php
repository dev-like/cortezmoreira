<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class banner extends Model
{
    protected $table = 'banner';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'caminho',
    'texto',
    'titulo',
    'link',
    'textobotao',
    'corbotao',
    'lado',
    'video',
    'ordem'
    ];

    use SoftDeletes;
}
