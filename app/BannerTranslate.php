<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerTranslate extends Model
{
    protected $table = 'banner_translate';
    protected $fillable = ['banner_id', 'title', 'text','slug','lang'];
    public $timestamps = false;
}
