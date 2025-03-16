<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'priority',
        'duedate',
        'user_id'
    ];


    protected $dates = [
        'duedate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
