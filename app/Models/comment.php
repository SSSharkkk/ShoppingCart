<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{


    use HasFactory;
 
    protected $fillable = [
        'user_id',
        'name',
        'content',
        'phone',
        'product_slug',
        'product_id',
        'status',
        'reply'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function  reply() {
        return $this->hasMany(comment::class);
    }
}
