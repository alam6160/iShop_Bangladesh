<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'nav_img',
        'shop_banner',
        'first_img',
        'second_img',
        'third_img',
    ];
    protected $table='banner_img';
}
