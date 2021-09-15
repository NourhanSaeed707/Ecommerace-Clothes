<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;
    protected $table= 'checkout';
    // protected $primaryKey = 'productid';
    public $timestamps=false;
    protected $fillable = [
        'productid',
        'firstname',
        'lastname',
        'phone',
        'nameoncard',
        'cardnumber',
        'datee',
        'postalcode',
        'securitycode',
    ];
}
