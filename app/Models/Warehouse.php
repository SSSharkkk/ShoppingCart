<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Warehouse extends Model
{
    public $timestamps = FALSE;


    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'product_quantity',
        'product_status',
    ];

    public function category() {
        
        return $this->belongsTo(Categories::class,'category_id');

    }

    public function product() {
       return $this->hasOne(Product::class);
    }

    public function order() {
        return $this->hasMany(order::class);
    }
    

}
