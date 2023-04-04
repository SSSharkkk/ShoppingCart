<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $timestamps = FALSE;

    use HasFactory;
    protected $fillable = [
        'product_id',
        'customer_id',
        'warehouse_id',
        'qty',
        'order_coder',
        'name',
        'email',
        'address',
        'phone',
        'note',
        'voucher_code'

    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function voucher() {
        return $this->belongsTo(voucher::class, 'voucher_code');
    }
}
