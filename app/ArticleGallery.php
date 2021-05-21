<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleGallery extends Model
{
    protected  $table = 'article_gallery';
    protected  $fillable = ['article_id','type','name','video_img','title_az','title_en','title_ru'];
    public $timestamps = false;
}
