<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'work';

    protected $fillable = [
        'name',
        'goods_id',
        'name',
        'before',
        'after',
        'lang',
        'author'
    ];

}
