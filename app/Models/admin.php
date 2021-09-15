<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table= 'admins';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'id',
        'email',
        'password',
    ];
}
