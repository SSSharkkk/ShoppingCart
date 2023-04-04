<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public $timestamps = FALSE;

    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'category_id',
        'product_price',
        'product_desc',
        'product_slug',
        'product_name',
        'product_status',
        '_token',
        'product_images'
    ];
    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');

    }
    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function comment() {
        return $this->hasMany(comment::class)->orderBy('id','DESC');
    }
}
