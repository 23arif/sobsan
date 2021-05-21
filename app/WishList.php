<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wishlist';
    protected $fillable = ['user_id', 'pr_id','selected','created_at','updated_at'];

    public function getPrDetails()
    {
        return $this->hasOne('\App\Products', 'id','pr_id');
    }
//
//    public function getPrColors()
//    {
//        return $this->hasOne('\App\Colors', 'id','pr_color');
//    }
}
