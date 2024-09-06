<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = 'events';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','start_date','end_date','celular'];


    use SoftDeletes;
}
