<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $table = 'category';
    protected  $fillable = ['parent','img','home','discount'];
    public $timestamps = false;

    public function getCat()
    {
        return $this->hasMany('\App\CategoryTranslate', 'cat_id','id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }
}
