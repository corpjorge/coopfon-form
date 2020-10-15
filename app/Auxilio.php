<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxilio extends Model
{
    protected $table = 'f_aux';
    
    protected $fillable = ['estado', 'user'];
}
