<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['cat_id','banner', 'price', 'discount','stock', 'active', 'destroy', 'blog_img', 'new', 'best', 'offer','home', 'created_at', 'updated_at'];

    public function  getPrCats(){
        return $this->hasMany('\App\PrCats', 'pr_id', 'id');
    }

    public function getPr()
    {
        return $this->hasMany('\App\PrDesc', 'pr_id', 'id');
    }

    public function getBrand()
    {
        return $this->hasMany('\App\Brend', 'id', 'brand');
    }

    public function getPrImgs()
    {
        return $this->hasMany('\App\PrImage', 'pr_id', 'id');
    }

    public function getPrColors()
    {
        return $this->hasMany('\App\PrColors', 'pr_id', 'id');
    }
   

    public function getWishlist()
    {
        return $this->hasMany('\App\WishList', 'pr_id', 'id');
    }
    public function getSuitables()
    {
        return $this->hasMany('\App\PrSuitable', 'pr_id', 'id');
    }
}
