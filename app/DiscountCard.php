<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCard extends Model
{
    protected $table = 'discount_card';
    protected $fillable = ['img'];
    public $timestamps = false;

    public function getCard()
    {
        return $this->hasMany('App\DiscountCardTranslate', 'card_id', 'id');
    }
}
