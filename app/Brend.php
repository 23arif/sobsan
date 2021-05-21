<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brend extends Model
{
    protected $table = 'brand';
    protected $fillable = ['img', 'name'];
    public $timestamps = false;

    
}
