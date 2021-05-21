<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    protected  $table = 'category_translate';
    protected  $fillable = ['cat_id','name','slug','lang'];
    public $timestamps = false;
}
