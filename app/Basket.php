<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';
    protected $fillable = ['user_id', 'pr_id','quantity','pr_color','created_at','updated_at'];

    public function getPrDetails()
    {
        return $this->hasOne('\App\Products', 'id','pr_id');
    }

    public function getColors()
    {
        return $this->hasMany('\App\Colors', 'id', 'pr_color');
    }

//    public function getPrColors()
//    {
//        return $this->hasMany('\App\PrColors', 'color_id', 'pr_color');
//    }
}
