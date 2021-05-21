<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $fillable = ['text', 'img'];
    public $timestamps = false;
}
