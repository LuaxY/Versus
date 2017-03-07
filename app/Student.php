<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $hidden = ['id', 'score'];
    
    public $timestamps = false;
}
