<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='slider';
    protected $fillable=['img','link'];
    public $timestamps = false;

    public function getSlider()
    {
        return $this->hasMany('\App\SliderTranslate', 'slider_id', 'id');
    }
}
