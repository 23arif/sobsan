<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrCats extends Model
{
    protected $table = 'pr_cats';
    protected $fillable = ['pr_id','cat_id'];
    public $timestamps = false;

    public function  getPrCatsTr(){
        return $this->hasMany('\App\CategoryTranslate', 'cat_id', 'cat_id');
    }

    public function  getPrdetails(){
        return $this->hasMany('\App\Products','id','pr_id');
    }
}
