<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $table = 'promo';
    protected $fillable = ['start', 'end', 'amount','type','cat'];
    public $timestamps = false;

    public function getPromoCat()
    {
        return $this->hasOne('\App\Category', 'id','cat');
    }
}
