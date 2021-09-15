<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    use HasFactory;
    protected $table= 'bags';
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
        'color',
        'image',
    ];
}
