<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newtask extends Model
{
    protected $fillable = [
        'title',
        'decription',
        'category',
        'priority',
        'is_completed'
    ];

}
