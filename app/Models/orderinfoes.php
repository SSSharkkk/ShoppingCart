<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderinfoes extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $fillable = [
        'order_coder',
        'order_status',
        'payment_status',
        'order_datetime',
    ];
}
