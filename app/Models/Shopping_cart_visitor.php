<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_cart_visitor extends Model
{
    use HasFactory;
    protected $table= 'shopping_cart_visitor';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'id',
        'name',
        'image',
        'quantity',
        'color',
        'size',
        'price',
        'total',
        'tablename',
    ];
}
