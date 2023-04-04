<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class diaries extends Model
{
    public $timestamps = 'Asia/Ho_Chi_Minh';
    use HasFactory;

    

    protected $fillable = [
         'user_id',
         'name',
         'content',
    ];
}
