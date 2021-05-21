<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTranslate extends Model
{
    protected  $table = 'menu_translate';
    protected  $fillable = ['menu_id','name','slug','lang'];
    public $timestamps = false;
}
