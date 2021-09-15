<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    use HasFactory;
    protected $table= 'shoes';
    protected $primaryKey = 'productid';
    public $timestamps=false;
    protected $fillable = [
        'productid',
        'name',
        'price',
        'discount',
        'total',
        'rate',
        'size_37',
        'size_38',
        'size_39',
        'size_40',
        'bestseller',
        'color',
        'image',
    ];
}
