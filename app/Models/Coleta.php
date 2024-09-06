<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coleta extends Model
{
    protected $table = 'coleta';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','start_date','end_date','endereco','celular'];


    use SoftDeletes;
}
