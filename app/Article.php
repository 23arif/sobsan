<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['img','img2', 'category_id', 'destroy','created_at','updated_at'];
    public $timestamps = false;


    public function getDates()
    {
        return array('created_at');
    }

    public function getArticles()
    {
        return $this->hasMany('App\ArticleTranslate', 'article_id', 'id');
    }

    public function getArticleCat()
    {
        return $this->hasOne('App\CategoryTranslate', 'cat_id','category_id');
    }
}
