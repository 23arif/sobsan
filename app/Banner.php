<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['img', 'destroy'];
    public $timestamps = false;

    public function getBanner()
    {
        return $this->hasMany('\App\BannerTranslate', 'banner_id','id');
    }
    public function getPrBanner()
    {
        return $this->hasMany('\App\Products', 'banner', 'id');
    }
}
