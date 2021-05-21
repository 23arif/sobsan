<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderTranslate extends Model
{
    protected $table='slider_translate';
    protected $fillable=['slider_id','title','text','button','lang'];
    public $timestamps = false;
}
