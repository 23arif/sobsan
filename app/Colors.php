<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';
        protected $fillable = ['color_n_az', 'color_n_en', 'color_n_ru','code'];
    public $timestamps = false;
}
