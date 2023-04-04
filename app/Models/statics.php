<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statics extends Model
{
   public  $timestamp = FALSE;
    use HasFactory;
    protected $fillable = [
        'date',
        'sales',
        'qty'
    ];
    
    
}
