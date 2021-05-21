<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCardTranslate extends Model
{
    protected $table = 'discount_card_translate';
    protected $fillable = ['card_id','title','text','lang','order_link','more_link'];
    public $timestamps = false;
}
