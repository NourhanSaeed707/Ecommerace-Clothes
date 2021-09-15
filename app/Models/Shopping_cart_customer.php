<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_cart_customer extends Model
{
    use HasFactory;
    protected $table= 'shopping_cart_customer ';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'id',
        'customerid',
        'name',
        'image',
        'quantity',
        'color',
        'size',
        'price',
        'total'
    ];
}
