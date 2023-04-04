<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'status',
        'percent',
        'value',
        'coder',
        'name'
    ];


    public function order() {
        return $this->hasMany(order::class);
    }
}
