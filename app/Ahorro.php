<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahorro extends Model
{
    protected $table = 'f_ahorros';
    
    protected $fillable = ['estado', 'user'];
}
