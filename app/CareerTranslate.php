<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerTranslate extends Model
{
    protected $table = 'career_translate';
    protected $fillable = ['career_id', 'title','short_text','text','lang'];
    public $timestamps = false;

    
    
}
