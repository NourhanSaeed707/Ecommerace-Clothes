<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunglasses extends Model
{
    use HasFactory;
    protected $table= 'sunglasses';
    protected $primaryKey = 'productid';
    public $timestamps=false;
    protected $fillable = [
        'productid',
        'name',
        'price',
        'discount',
        'total',
        'rate',
        'bestseller',
        'image',
    ];
}
