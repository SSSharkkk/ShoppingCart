<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authorization extends Model
{
    public $timestamps = FALSE;

    use HasFactory;

    protected $fillable = [
        'function',
        'chat',
        'manager',
    ];
    
}
