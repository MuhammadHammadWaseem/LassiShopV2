<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code',
        'name',
        'image',
        'is_ingredient',
    ];

}
