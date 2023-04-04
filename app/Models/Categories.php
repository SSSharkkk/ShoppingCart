<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{  
    public $timestamps = FALSE;
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
        'category_slug',
    ];
    public function product() {
        return $this->hasMany(Product::class)->orderBy('id','DESC');

    }
    public function warehouse() {
        return $this->hasMany(Warehouse::class)->orderBy('id','DESC');
    }
}
