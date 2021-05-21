<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslate extends Model
{
    protected  $table = 'article_translate';
    protected  $fillable = ['article_id','title','short_text','text','text2','lang','slug'];
    public $timestamps = false;

    public function getArticle()
    {
        return $this->hasOne('\App\Article', 'id','article_id');
    }
}
