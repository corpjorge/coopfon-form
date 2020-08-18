<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table = 'f_creditos';
    
    protected $fillable = ['estado'];
}
