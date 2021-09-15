<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kidGirl extends Model
{
    use HasFactory;
    protected $table= 'kids_girls';
    protected $primaryKey = 'productid';
    public $timestamps=false;
    protected $fillable = [
        'productid',
        'name',
        'price',
        'discount',
        'total',
        'rate',
        'small',
        'medium',
        'large',
        'xl',
        'bestseller',
        'color',
        'image',
    ];
}
